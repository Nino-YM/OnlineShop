@extends('layouts.app')

@section('title', 'Addresses')

@section('content')
    <h1>Addresses</h1>
    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Add New Address</a>
    <div class="row">
        @foreach($addresses as $address)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $address->name }}</h5>
                        <p class="card-text">{{ $address->city }}, {{ $address->postal_code }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('addresses.show', $address) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('addresses.destroy', $address) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
