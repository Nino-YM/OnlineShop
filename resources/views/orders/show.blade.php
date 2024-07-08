@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Order #{{ $order->id }}</h1>
        <p class="text-center"><strong>Total Price:</strong> ${{ $order->total_price }}</p>
        <p class="text-center"><strong>Status:</strong> {{ $order->status }}</p>
        <p class="text-center"><strong>Placed on:</strong> {{ $order->created_at->format('M d, Y') }}</p>

        <h2 class="text-center mt-4">Products</h2>
        <ul class="list-group list-group-flush">
            @foreach($order->products as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $product->name }} - ${{ $product->pivot->price }} (Quantity: {{ $product->pivot->quantity }})
                </li>
            @endforeach
        </ul>

        <div class="text-center mt-4">
            <a href="{{ route('orders.index') }}" class="btn btn-custom">Back to Orders</a>
        </div>
    </div>
@endsection
