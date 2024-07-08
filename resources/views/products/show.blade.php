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

        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h3>Reviews</h3>
                @foreach($product->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->user->username }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Rating: {{ $review->rating }}</h6>
                            <p class="card-text">{{ $review->comment }}</p>
                            @can('delete', $review)
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach

                @auth
                    <h4>Leave a Review</h4>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select name="rating" id="rating" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
