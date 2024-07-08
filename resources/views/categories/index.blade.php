@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    @auth
        @if (auth()->user()->role_id === 1)
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>
        @endif
    @endauth
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                @auth
                                    @if (auth()->user()->role_id === 1)
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
