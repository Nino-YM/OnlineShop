@extends('layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="{{ route('products.show', 6) }}">
                    <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="First slide">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ferrofluid ! Brand New !</h5>
                    <p>Check out our new ferrofluid arrival !</p>
                </div>
            </div>
            <div class="carousel-item">
                <a href="{{ route('promotions.index') }}">
                    <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="Second slide">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Celebrating Newton's Birthday !</h5>
                    <p>20% off on all items Newton related !</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-5">
        <h2>Featured Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm flex-fill">
                        <div class="image-container">
                            <img src="{{ $product->image_url }}" class="card-img-top img-custom" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="mt-auto">
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
                                    <small class="text-muted"><s>${{ $product->price }}</s> ${{ $product->discounted_price }}</small>
                                    @else
                                        <small class="text-muted">${{ $product->price }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }
    .card-custom {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    .img-custom {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .btn-outline-secondary {
        color: #343a40;
        border-color: #343a40;
    }
    .btn-outline-secondary:hover {
        background-color: #343a40;
        color: white;
    }
    .btn-outline-success {
        color: #28a745;
        border-color: #28a745;
    }
    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }
</style>
@endsection
