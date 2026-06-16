@extends('layouts.app')

@section('title', 'Payment not completed')

@section('content')
    <main class="main-wrapper">
        <section class="section wrapper">
            <header class="section-heading">
                <p class="eyebrow">Payment not completed</p>
                <h1>Your payment was not completed</h1>
                <p>
                    Your order has been created, but the payment was not completed.
                    You can try again or contact us if you need help.
                </p>
            </header>

            @isset($order)
                <div class="info-card">
                    <p><strong>Order number:</strong> {{ $order->order_number }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    <p><strong>Payment:</strong> {{ ucfirst($order->payment_status) }}</p>
                </div>
            @endisset

            <div class="hero-actions">
                <a href="{{ url('/joao-cagarro#order-book') }}" class="button primary">Try again</a>
                <a href="{{ url('/contact') }}" class="button secondary">Contact us</a>
            </div>
        </section>
    </main>
@endsection
