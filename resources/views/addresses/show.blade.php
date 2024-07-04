@extends('layouts.app')

@section('title', $address->name)

@section('content')
    <h1>{{ $address->name }}</h1>
    <p><strong>City:</strong> {{ $address->city }}</p>
    <p><strong>Postal Code:</strong> {{ $address->postal_code }}</p>
    <a href="{{ route('addresses.index') }}" class="btn btn-primary">Back to Addresses</a>
@endsection
