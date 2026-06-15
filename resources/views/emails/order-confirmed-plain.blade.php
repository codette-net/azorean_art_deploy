Order confirmed for : {{ $order->customer_name }} - {{ $order->customer_email }}
Order number: {{ $order->order_number }}
@foreach($order->items as $item)
- {{ $item->product_name }} (x{{ $item->quantity }}) - €{{ number_format($item->total_price_cents / 100, 2) }}
@endforeach
Total paid: €{{ number_format($order->total_cents / 100, 2) }}

Thank you for your purchase! Your order has been confirmed. We will notify you once your items are shipped.