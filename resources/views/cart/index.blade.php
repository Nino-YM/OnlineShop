@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <h1>Shopping Cart</h1>
    <div class="row">
        @if (auth()->check())
            @forelse ($cartItems as $cartItem)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <img src="{{ $cartItem->product->image_url }}" class="card-img-top" alt="{{ $cartItem->product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cartItem->product->name }}</h5>
                            <p class="card-text">{{ $cartItem->product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('cart.destroy', $cartItem->product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove from Cart</button>
                                </form>
                            </div>
                            @if($cartItem->product->discounted_price < $cartItem->product->price)
                                <p class="text-center"><strong>Price:</strong> <s>${{ $cartItem->product->price }}</s> ${{ $cartItem->product->discounted_price }}</p>
                            @else
                                <p class="text-center"><strong>Price:</strong> ${{ $cartItem->product->price }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse
        @else
            @forelse (session('cart', []) as $cartItem)
                @php
                    $product = \App\Models\Product::find($cartItem['product_id']);
                @endphp
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('cart.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove from Cart</button>
                                </form>
                            </div>
                            <small class="text-muted">${{ $product->price }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse
        @endif
    </div>
@endsection
