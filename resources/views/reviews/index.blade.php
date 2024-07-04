@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <h1>Reviews</h1>
    <div class="row">
        @foreach($reviews as $review)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->product->name }}</h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text">Rating: {{ $review->rating }}/5</p>
                        <p class="card-text">Reviewed by: {{ $review->user->username }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
