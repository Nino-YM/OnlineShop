@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <h1>{{ $user->username }}</h1>
    <p>Name: {{ $user->first_name }} {{ $user->last_name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role->name }}</p>
    <p>Created at: {{ $user->created_at }}</p>
    <p>Updated at: {{ $user->updated_at }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
@endsection
