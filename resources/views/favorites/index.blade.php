@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
    <h1>My Favorites</h1>
    <div class="row">
        @foreach($favorites as $favorite)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $favorite->product->image_url }}" class="card-img-top" alt="{{ $favorite->product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->product->name }}</h5>
                        <p class="card-text">{{ $favorite->product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('products.show', $favorite->product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <form action="{{ route('favorites.destroy', $favorite) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove from Favorites</button>
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
            </div>
        @endforeach
    </div>
@endsection
