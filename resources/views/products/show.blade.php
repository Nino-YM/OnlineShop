@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid mb-3">
    <p>{{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
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
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
@endsection
