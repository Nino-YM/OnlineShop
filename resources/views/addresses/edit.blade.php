@extends('layouts.app')

@section('title', 'Edit Address')

@section('content')
    <h1>Edit Address</h1>
    <form action="{{ route('addresses.update', $address) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Address Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $address->name }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $address->city }}" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $address->postal_code }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Address</button>
    </form>
@endsection
