<?php

namespace App\Services\Payments;

use App\Contracts\PaymentGateway;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Mollie\Api\Exceptions\RequestException;
use Mollie\Api\MollieApiClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmedMail;

class MolliePaymentService implements PaymentGateway
{
    private MollieApiClient $client;

    public function __construct()
    {
        $this->client = new MollieApiClient();
        $this->client->setApiKey(config('services.mollie.key'));
    }

    /**
     * @throws RequestException
     */
    public function createPayment(Order $order, int $amountInCents): string
    {
        Log::info("Creating Mollie payment for order {$order->id}");
        Log::info("Amount: {$amountInCents} cents");
        Log::info("Currency: {$order->currency}");
        Log::info("Description: Order {$order->order_number}");
        Log::info("Redirect URL: " . config('services.mollie.redirect_url'));
        Log::info("Webhook URL: " . config('services.mollie.webhook_url'));
        Log::info("Metadata: order_id: {$order->id}");
        Log::info("Order items: " . json_encode($order->items->toArray()));

        $payment = $this->client->payments->create([
            'amount' => [
                'currency' => $order->currency,
                'value' => number_format($amountInCents / 100, 2, '.', ''),
            ],
            'description' => "Order {$order->order_number}",
            'redirectUrl' => config('services.mollie.redirect_url') . '/checkout/success/' . $order->id,
//            'redirectUrl' => config('services.mollie.redirect_url'),
            'webhookUrl' => config('services.mollie.webhook_url'),
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);


        // Sla Mollie payment ID op
        $order->update(['payment_reference' => $payment->id]);

        Log::info("Saved Mollie payment reference", [
            'order_id' => $order->id,
            'payment_reference' => $payment->id,
        ]);

        Log::info('Mollie payment created', [
            'payment_id' => $payment->id,
            'checkout_url' => $payment->getCheckoutUrl(),
            'status' => $payment->status,
            'raw_checkout_link' => $payment->_links->checkout->href ?? null,
        ]);


        return $payment->getCheckoutUrl();
    }

    /**
     * @throws RequestException
     */
    public function handleWebhook(array $payload): void
    {
        $paymentId = $payload['id'] ?? null;
        if (!$paymentId) {
            return;
        }

        \Log::info("Mollie webhook received for payment {$paymentId}");

        $payment = $this->client->payments->get($paymentId);
        $order = Order::where('payment_reference', $paymentId)->first();

        Log::info('Matched order for Mollie payment', [
            'payment_id' => $paymentId,
            'order_id' => $order?->id,
        ]);

        if (!$order) {
            return;
        }

        \Log::info("Mollie webhook received for order {$order->id} with status {$payment->status}");

        if ($payment->isPaid()) {

            $order->update([
                'payment_status' => 'paid',
                'status' => 'processing',
            ]);

            try {
                Mail::to($order->customer_email)->send(new OrderConfirmedMail($order));
            } catch (\Throwable $e) {
                Log::error('Order confirmation mail failed', [
                    'order_id' => $order->id,
                    'error' => $e->getMessage(),
                ]);
            }
        } elseif ($payment->isFailed() || $payment->isExpired()) {
            $order->update([
                'payment_status' => 'failed',
                'status' => 'cancelled',
            ]);
        }
    }
}
