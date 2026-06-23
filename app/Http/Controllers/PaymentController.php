<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use App\Models\Order;
use App\Services\Orders\CheckoutOrderService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function __construct(
    private readonly CheckoutOrderService $orderService,
    private readonly PaymentGateway $payments
  ) {}

  public function checkout(Request $request)
  {
    // dd($request->all());
    // 1. Valideer de klant-, variant- en adresgegevens
    $validated = $request->validate([
      'variant_ids'            => 'required|array|min:1',
      'variant_ids.*'          => 'exists:product_variants,id',
      'quantity'               => [
        'required',
        'array',
        function ($attribute, $value, $fail) {
          if (collect($value)->filter(fn($qty) => intval($qty) > 0)->isEmpty()) {
            $fail('At least one item must have a quantity greater than zero.');
          }
        },
      ],
      'quantity.*'             => 'nullable|integer|min:0',
      'customer_name'          => 'required|string',
      'customer_email'         => 'required|email',
      'shipping_address_line_1' => 'required|string',
      'shipping_city'          => 'required|string',
      'shipping_postal_code'   => 'required|string',
      'shipping_country'       => 'required|string',
      'shipping_zone_id'       => 'required|exists:shipping_zones,id',
    ],
    [
      'variant_ids.required' => 'Please select at least one product variant.',
      'quantity.required' => 'Please specify quantities for the selected variants.',
      'customer_name.required' => 'Please enter your name.',
      'customer_email.required' => 'Please enter your email address.',
      'shipping_address_line_1.required' => 'Please enter your shipping address.',
      'shipping_city.required' => 'Please enter your city.',
      'shipping_postal_code.required' => 'Please enter your postal code.',
      'shipping_country.required' => 'Please enter your country.',
      'shipping_zone_id.required' => 'Please select a shipping zone.',
    ]);
    // dd($validated);
    // 2. Maak de order + order items aan
      try {
          $order = $this->orderService->createOrderFromRequest($validated);
      } catch (\RuntimeException $e) {
          return back()
              ->withErrors(['shipping_zone_id' => 'No shipping rate is available for this weight. Please contact us.'])
              ->withInput();
      }

    // 3. Start de Mollie-betaling en haal de checkout URL op
    $checkoutUrl = $this->payments->createPayment($order, $order->total_cents);

      \Log::info('Redirecting customer to Mollie checkout', [
          'order_id' => $order->id,
          'checkout_url' => $checkoutUrl,
      ]);

    // 4. Redirect klant naar de Mollie-betaalpagina


      return redirect()->away($checkoutUrl);
//      return view('shop.redirect', [
//          'checkoutUrl' => $checkoutUrl,
//      ]);
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
