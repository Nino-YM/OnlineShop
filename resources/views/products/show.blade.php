@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid mb-3">
    <p>{{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
@endsection
