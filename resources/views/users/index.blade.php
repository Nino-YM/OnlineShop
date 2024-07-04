@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1>Users</h1>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->username }}</h5>
                        <p class="card-text">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class="card-text">{{ $user->email }}</p>
                        <p class="card-text">Role: {{ $user->role->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
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
