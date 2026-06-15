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
              @if($paymentStatus === 'paid')
                Thank you for your purchase! Your payment was successful.
              @elseif($paymentStatus === 'pending')
                Your order is being processed. We will notify you once the payment is confirmed.
              @elseif($paymentStatus === 'failed')
                Unfortunately, your payment failed. Please try again or contact support if the issue persists.
              @else
                Your order status is: {{ ucfirst($paymentStatus) }}. Please check your email for more details.
              @endif
            </p>
            <a href="{{ route('joao-cagarro') }}" class="button primary">Back to joao cagarro</a>
          </header>
        </section>
    </main>

@endsection
