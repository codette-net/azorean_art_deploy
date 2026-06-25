<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutEmailVerificationController extends Controller
{
    public function __construct(
        private readonly PaymentGateway $payments,
    ) {}

    public function __invoke(Request $request, Order $order)
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Invalid or expired verification link.');
        }

        if ($order->customer_email_verified_at === null) {
            $order->update([
                'customer_email_verified_at' => now(),
            ]);
        }

        $checkoutUrl = $this->payments->createPayment($order, $order->total_cents);

        return redirect()->away($checkoutUrl);
    }
}
