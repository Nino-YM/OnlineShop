@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <h1>Orders</h1>
    <div class="row">
        @foreach($orders as $order)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Order #{{ $order->id }}</h5>
                        <p class="card-text">Total Price: ${{ $order->total_price }}</p>
                        <p class="card-text">Status: {{ $order->status }}</p>
                        <p class="card-text">Placed on: {{ $order->created_at->format('M d, Y') }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
