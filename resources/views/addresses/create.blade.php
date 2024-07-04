@extends('layouts.app')

@section('title', 'Add New Address')

@section('content')
    <h1>Add New Address</h1>
    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Address Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Address</button>
    </form>
@endsection
