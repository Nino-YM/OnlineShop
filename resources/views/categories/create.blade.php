@extends('layouts.app')

@section('title', 'Add New Category')

@section('content')
    <h1>Add New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Category Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
@endsection
