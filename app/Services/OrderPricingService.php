<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\ShippingRate;

class OrderPricingService
{
    public function calculateOrderItemData(array $data): array
    {
        $variant = ProductVariant::find($data['product_variant_id'] ?? null);

        $quantity = max(1, (int) ($data['quantity'] ?? 1));
        $unitPrice = (int) ($data['unit_price_cents'] ?? $variant?->price_cents ?? 0);
        $unitWeight = (int) ($data['unit_weight_grams'] ?? $variant?->weight_grams ?? 0);

        $data['title_snapshot'] = $data['title_snapshot'] ?? $variant?->title ?? 'Unknown item';
        $data['unit_price_cents'] = $unitPrice;
        $data['unit_weight_grams'] = $unitWeight;
        $data['quantity'] = $quantity;
        $data['total_cents'] = $unitPrice * $quantity;
        $data['total_weight_grams'] = $unitWeight * $quantity;

        return $data;
    }

    public function calculateOrderTotals(array $data): array
    {
        $items = $data['items'] ?? [];

        $subtotal = 0;
        $weight = 0;

        foreach ($items as $index => $item) {
            $item = $this->calculateOrderItemData($item);

            $data['items'][$index] = $item;

            $subtotal += (int) $item['total_cents'];
            $weight += (int) $item['total_weight_grams'];
        }

        $shipping = $this->calculateShipping(
            $data['shipping_zone_id'] ?? null,
            $weight
        );

        $data['subtotal_cents'] = $subtotal;
        $data['shipping_cents'] = $shipping;
        $data['total_cents'] = $subtotal + $shipping;

        return $data;
    }

    /**
     * @throws \Exception
     */
    public function calculateShipping(?int $shippingZoneId, int $weightGrams): int
    {
        if (! $shippingZoneId || $weightGrams <= 0) {
            return 0;
        }

        $rate = ShippingRate::query()
            ->where('shipping_zone_id', $shippingZoneId)
            ->where('weight_from_grams', '<=', $weightGrams)
            ->where('weight_to_grams', '>=', $weightGrams)
            ->orderBy('weight_from_grams')
            ->first();

        if (! $rate) {
            throw new \Exception('Shipping rate not found');
        }
        return (int) $rate->amount_cents;

    }

    public function syncOrderTotalsFromRecord(Order $order): void
    {
        $order->refresh();
        $order->load('items');

        $subtotal = (int) $order->items->sum('total_cents');
        $weight = (int) $order->items->sum('total_weight_grams');

        $shipping = $this->calculateShipping(
            $order->shipping_zone_id,
            $weight
        );

        $order->update([
            'subtotal_cents' => $subtotal,
            'shipping_cents' => $shipping,
            'total_cents' => $subtotal + $shipping,
        ]);
    }
}
