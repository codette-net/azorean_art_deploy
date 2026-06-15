@extends('layouts.app')

@section('content')
    <style>
        strong,h3 {
            color: rgb(var(--neutral-9));
        }

            hr {
            background-color: #5555;
        }

        p ,li {
            font-size: 1.2rem;
        }

        li {
            border-bottom: 1px solid #5555;
        }
    </style>
    <main class="main-checkout">

    <section class="checkout success">
    <header>
        <h2>Order status</h2>
        <p>{{ $order->customer_name }} - {{ $order->customer_email  }}</p>
        <hr>
        <p><strong>Order number:</strong> {{ $order->order_number }}</p>
        <p><strong>Order status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Payment status:</strong> {{ ucfirst($order->payment_status) }}</p>
        <p><strong>Order date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        <hr>
        <p><strong>Items</strong></p>

        <ul class="alt">
            @foreach ($order->items as $item)
                <li>
                    {{ $item->quantity }} × {{ $item->title_snapshot }}
                    : € {{ number_format($item->total_cents / 100, 2) }}
                </li>
            @endforeach
        </ul>

            <p><strong>Subtotal:</strong> € {{ number_format($order->subtotal_cents / 100, 2) }}</p>
            <p><strong>Shipping:</strong> € {{ number_format($order->shipping_cents / 100, 2) }}</p>
            <p><strong>Total:</strong> € {{ number_format($order->total_cents / 100, 2) }}</p>
        <br>
            <p>This page refreshes automatically while your order is being processed.</p>
    </header>

    </section>
    </main>
    <script>
        setTimeout(() => {
            window.location.reload();
        }, 30000);
    </script>
@endsection
