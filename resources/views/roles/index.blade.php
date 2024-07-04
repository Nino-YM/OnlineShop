@extends('layouts.app')

@section('title', 'Roles')

@section('content')
    <h1>Roles</h1>
    <div class="row">
        @foreach($roles as $role)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $role->name }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline-block;">
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
