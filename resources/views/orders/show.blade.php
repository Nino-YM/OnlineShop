@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <h1>Order #{{ $order->id }}</h1>
    <p>Total Price: ${{ $order->total_price }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Placed on: {{ $order->created_at->format('M d, Y') }}</p>

    <h2>Products</h2>
    <ul>
        @foreach($order->products as $product)
            <li>{{ $product->name }} - ${{ $product->pivot->price }} (Quantity: {{ $product->pivot->quantity }})</li>
        @endforeach
    </ul>

    <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
@endsection
