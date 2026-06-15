@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Cancelled</h1>
        <p>Your order has been cancelled.</p>
        <a href="{{ route('joao-cagarro') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
@endsection
