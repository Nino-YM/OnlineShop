@extends('layouts.app')

@section('title', $address->name)

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ $address->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>City:</strong> {{ $address->city }}</p>
            <p><strong>Postal Code:</strong> {{ $address->postal_code }}</p>
            <div class="btn-group" role="group">
                <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Back to Addresses</a>
                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('addresses.destroy', $address) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
