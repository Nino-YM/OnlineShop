@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Category Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required>{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-custom">Update Category</button>
        </form>
    </div>
@endsection
