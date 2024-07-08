@extends('layouts.app')

@section('title', 'Edit Promotion')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Promotion</h1>
        <form action="{{ route('promotions.update', $promotion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Promotion Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $promotion->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ $promotion->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="discount_percentage">Discount Percentage</label>
                <input type="number" name="discount_percentage" class="form-control" id="discount_percentage" value="{{ $promotion->discount_percentage }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $promotion->start_date->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $promotion->end_date->format('Y-m-d') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Promotion</button>
        </form>
    </div>
@endsection
