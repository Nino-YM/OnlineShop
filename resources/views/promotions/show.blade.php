@extends('layouts.app')

@section('title', 'Promotion Details')

@section('content')
    <h1>{{ $promotion->name }}</h1>
    <p>{{ $promotion->description }}</p>
    <p>Discount: {{ $promotion->discount_percentage }}%</p>
    <p>Valid from: {{ $promotion->start_date }} to {{ $promotion->end_date }}</p>

    <a href="{{ route('promotions.index') }}" class="btn btn-primary">Back to Promotions</a>
@endsection
