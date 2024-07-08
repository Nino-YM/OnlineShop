@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid mx-auto d-block">
            </div>
            <div class="col-md-6">
                <h1 class="text-center">{{ $product->name }}</h1>
                <p class="text-center">{{ $product->description }}</p>
                @if($product->discounted_price < $product->price)
                    <p class="text-center"><strong>Price:</strong> <s>${{ $product->price }}</s> ${{ $product->discounted_price }}</p>
                @else
                    <p class="text-center"><strong>Price:</strong> ${{ $product->price }}</p>
                @endif
                <p class="text-center"><strong>In Stock:</strong> {{ $product->stock_quantity }}</p>
                <div class="text-center">
                    <form action="{{ route('favorites.store') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Add to Favorites</button>
                    </form>
                    <form action="{{ route('cart.store') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
