<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Services\OrderPricingService;

class CheckoutOrderService
{
    public function __construct(
        private readonly OrderPricingService $pricing
    ) {}

    public function createOrderFromRequest(array $data): Order
    {
        // dd($data);
        // 1. Maak order aan
        $order = Order::create([
            'order_number'     => 'ORD-' . now()->format('Ymd') . '-' . rand(1000, 9999),
            'status'           => 'pending',
            'payment_status'   => 'pending',
            'payment_method'   => 'mollie',
            'customer_name'    => $data['customer_name'],
            'customer_email'   => $data['customer_email'],
            'customer_phone'   => $data['customer_phone'] ?? null,
            'shipping_name'    => $data['shipping_name'] ?? $data['customer_name'],
            'shipping_address_line_1' => $data['shipping_address_line_1'],
            'shipping_address_line_2' => $data['shipping_address_line_2'] ?? null,
            'shipping_postal_code'    => $data['shipping_postal_code'],
            'shipping_city'    => $data['shipping_city'],
            'shipping_country' => $data['shipping_country'],
            'shipping_zone_id' => $data['shipping_zone_id'],
            'currency'         => 'EUR',
        ]);

        foreach ($data['variant_ids'] as $variantId) {
            $quantity = (int) ($data['quantity'][$variantId] ?? 0);
            if ($quantity < 1) {
                continue;
            }

            $variant = ProductVariant::findOrFail($variantId);

            // Bereken snapshot en totalen per regel
            $itemData = [
                'order_id'            => $order->id,
                'product_variant_id'  => $variant->id,
                'title_snapshot'      => $variant->title,
                'unit_price_cents'    => $variant->price_cents,
                'unit_weight_grams'   => $variant->weight_grams,
                'quantity'            => $quantity,
                'total_cents'         => $variant->price_cents * $quantity,
                'total_weight_grams'  => $variant->weight_grams * $quantity,
            ];

            OrderItem::create($itemData);
        }

        // 3. Herbereken subtotal, shipping en total voor de order
        $this->pricing->syncOrderTotalsFromRecord($order);

        return $order;
    }
}
