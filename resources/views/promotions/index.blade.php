@extends('layouts.app')

@section('title', 'Promotions')

@section('content')
    <h1 class="text-center mb-4">Promotions</h1>
    @can('create', App\Models\Promotion::class)
        <div>
            <a href="{{ route('promotions.create') }}" class="btn btn-custom">Add New Promotion</a><br><br>
        </div>
    @endcan
    <div class="row">
        @foreach($promotions as $promotion)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm card-custom">
                    <div class="card-body">
                        <h5 class="card-title">{{ $promotion->name }}</h5>
                        <p class="card-text">{{ $promotion->description }}</p>
                        <p class="card-text"><strong>Discount:</strong> {{ $promotion->discount_percentage }}%</p>
                        <p class="card-text"><strong>Valid from:</strong> {{ $promotion->start_date }}</p>
                        <p class="card-text"><strong>to:</strong> {{ $promotion->end_date }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('promotions.show', $promotion) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            @can('update', $promotion)
                                <a href="{{ route('promotions.edit', $promotion) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            @endcan
                            @can('delete', $promotion)
                                <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
