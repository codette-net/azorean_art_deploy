@extends('layouts.app')

@section('content')
    <main class="main-checkout">
        <section class="checkout success">
            <header>
                <h2>Check your email</h2>

                <p>
                    We sent a confirmation link to
                    <strong>{{ $order->customer_email }}</strong>.
                </p>

                <p>
                    Please click the link in that email to continue to payment.
                </p>
            </header>
        </section>
    </main>
@endsection
