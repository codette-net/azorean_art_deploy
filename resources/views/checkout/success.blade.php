@extends('layouts.app')

@section('content')
@php
 // get status of the order
 $paymentStatus = $order->payment_status; // 'paid', 'pending', 'failed', etc.


@endphp

    <main class="main-checkout">
        <section class="checkout success">
          <header>
            <h2> Thank You!</h2>
              <p>
                  <strong>Order number:</strong>
                  {{ $order->order_number }}
              </p>
            <p>
              @if($paymentStatus === 'paid')
                Thank you for your purchase! Your payment was successful. Check your email for confirmation.
              @elseif($paymentStatus === 'pending')
                Your order is being processed. We will notify by e-mail you once the payment is confirmed.
              @elseif($paymentStatus === 'failed')
                Unfortunately, your payment failed. Please try again or contact support if the issue persists.
              @else
                Your order status is: {{ ucfirst($paymentStatus) }}. Please check your email for more details.
              @endif
            </p>
              <br>
              <div class="checkout-actions">

                  <a href="{{ route('shop.order-status', $order->order_number) }}"
                     class="button primary">
                      Track my order
                  </a>

                  <a href="{{ route('joao-cagarro') }}"
                     class="button primary">
                      Back to João Cagarro
                  </a>

              </div>
          </header>
        </section>
    </main>

@endsection
