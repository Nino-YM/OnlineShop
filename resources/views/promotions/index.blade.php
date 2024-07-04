@extends('layouts.app')

@section('title', 'Promotions')

@section('content')
    <h1>Promotions</h1>
    <div class="row">
        @foreach($promotions as $promotion)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $promotion->name }}</h5>
                        <p class="card-text">{{ $promotion->description }}</p>
                        <p class="card-text">Discount: {{ $promotion->discount_percentage }}%</p>
                        <p class="card-text">Valid from: {{ $promotion->start_date }} to {{ $promotion->end_date }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('promotions.show', $promotion) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" style="display:inline-block;">
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
