<?php
namespace App\Contracts;

use App\Models\Order;

interface PaymentGateway
{
    public function createPayment(Order $order, int $amountInCents): string; // retourneert checkout URL
    public function handleWebhook(array $payload): void;
}
