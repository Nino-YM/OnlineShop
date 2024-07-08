@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="image_url">Product Image URL</label>
                <input type="url" name="image_url" id="image_url" class="form-control" value="{{ $product->image_url }}">
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-custom">Update Product</button>
        </form>
    </div>
@endsection
