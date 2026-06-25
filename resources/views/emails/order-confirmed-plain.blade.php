Order confirmed

{{ $order->customer_name }} - {{ $order->customer_email }}

Shipping address:
{{ $order->shipping_address_line_1 }}
@if(! empty($order->shipping_address_line_2))
    {{ $order->shipping_address_line_2 }}
@endif
{{ $order->shipping_postal_code }} {{ $order->shipping_city }}
{{ $order->shipping_country }}

Order details:
Order number: {{ $order->order_number }}

@foreach($order->items as $item)
    - {{ $item->title_snapshot }} x{{ $item->quantity }}: €{{ number_format($item->unit_price_cents / 100, 2) }}
@endforeach

Subtotal: €{{ number_format($order->subtotal_cents / 100, 2) }}
Shipping costs: €{{ number_format($order->shipping_cents / 100, 2) }}
Total paid: €{{ number_format($order->total_cents / 100, 2) }}

Thank you for your purchase! Your order has been confirmed.
We will notify you once your items are shipped.

You can check the status of your order here:
{{ route('shop.order-status', $order->order_number) }}

© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
