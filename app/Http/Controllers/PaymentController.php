<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use App\Mail\CheckoutEmailVerificationMail;
use App\Models\Order;
use App\Services\Orders\CheckoutOrderService;
use chillerlan\QRCode\Decoder\Binarizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct(
        private readonly CheckoutOrderService $orderService,
        private readonly PaymentGateway       $payments
    )
    {
    }

    public function checkout(Request $request)
    {
        $quantities = collect($request->input('quantity', []))
            ->map(fn($qty) => trim((string)$qty) === '' ? 0 : $qty)
            ->toArray();

        $request->merge([
            'quantity' => $quantities,
        ]);

        $validated = $request->validate([
            'quantity' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    $hasItems = collect($value)
                        ->filter(fn($qty) => (int)$qty > 0)
                        ->isNotEmpty();

                    if (!$hasItems) {
                        $fail('Please select at least one item.');
                    }
                },
            ],

            'quantity.*' => ['nullable', 'integer', 'min:0'],

            'customer_name' => ['required', 'string'],
            'customer_email' => ['required', 'email'],
            'shipping_address_line_1' => ['required', 'string'],
            'shipping_city' => ['required', 'string'],
            'shipping_postal_code' => ['required', 'string'],
            'shipping_country' => ['required', 'string'],
            'shipping_zone_id' => ['required', 'exists:shipping_zones,id'],
        ]);

        $validated['variant_ids'] = collect($validated['quantity'])
            ->filter(fn($qty) => (int)$qty > 0)
            ->keys()
            ->values()
            ->toArray();

        try {
            $order = $this->orderService->createOrderFromRequest($validated);
        } catch (\RuntimeException $e) {
            return back()
                ->withErrors(['shipping_zone_id' => 'No shipping rate is available for this weight. Please contact us.'])
                ->withInput();
        }

//        $checkoutUrl = $this->payments->createPayment($order, $order->total_cents);
//
//        return redirect()->away($checkoutUrl);
        Mail::to($order->customer_email)
            ->send(new CheckoutEmailVerificationMail($order));

        return view('checkout.verify-email-sent', compact('order'));

    }

    public function success(Order $order)
    {
        // Mollie schakelt via webhook de status, dus hier alleen bedankpagina tonen
        return view('checkout.success', compact('order'));
    }

    public function cancel(Order $order)
    {
        // Eventueel order-status op 'cancelled' zetten
        return view('checkout.cancel', compact('order'));
    }
}
