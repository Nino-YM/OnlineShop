@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h1 class="text-center mb-4">Products</h1>
    @auth
        @if (auth()->user()->role_id === 1)
            <a href="{{ route('products.create') }}" class="btn btn-custom mb-3">Add New Product</a>
        @endif
    @endauth
    <div class="row">
        @foreach($products as $product)
            @if ($product->stock_quantity > 0)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    @auth
                                        @can('update', $product)
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        @endcan
                                        @can('delete', $product)
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        @endcan
                                    @endauth
                                    <form action="{{ route('cart.store') }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-success">Add to Cart</button>
                                    </form>
                                </div>
                                @if($product->discounted_price < $product->price)
                                    <small class="text-muted"><s>${{ $product->price }}</s> ${{ $product->discounted_price }}</small>
                                @else
                                    <small class="text-muted">${{ $product->price }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
