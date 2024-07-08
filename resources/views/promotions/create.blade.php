@extends('layouts.app')

@section('title', 'Create Promotion')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create Promotion</h1>
        <form action="{{ route('promotions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Promotion Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="discount_percentage">Discount Percentage</label>
                <input type="number" name="discount_percentage" class="form-control" id="discount_percentage" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" required>
            </div>
            <div class="form-group">
                <label for="products">Select Products</label>
                <select name="products[]" id="products" class="form-control" multiple required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-custom">Create Promotion</button>
        </form>
    </div>
@endsection
