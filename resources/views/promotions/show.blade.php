@extends('layouts.app')

@section('title', $promotion->name)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $promotion->name }}</h1>
        <p>{{ $promotion->description }}</p>
        <p><strong>Discount:</strong> {{ $promotion->discount_percentage }}%</p>
        <p><strong>Valid from:</strong> {{ $promotion->start_date }}</p>
        <p><strong>to:</strong> {{ $promotion->end_date }}</p>
        
        <h2 class="mt-5">Products on Promotion</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>In Stock:</strong> {{ $product->stock_quantity }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <form action="{{ route('cart.store') }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-success">Add to Cart</button>
                                    </form>
                                </div>
                                @if($product->discounted_price < $product->price)
                                    <p class="text-center"><strong>Price:</strong> <s>${{ $product->price }}</s> ${{ $product->discounted_price }}</p>
                                @else
                                    <p class="text-center"><strong>Price:</strong> ${{ $product->price }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('promotions.index') }}" class="btn btn-primary mt-3">Back to Promotions</a>
    </div>
@endsection
