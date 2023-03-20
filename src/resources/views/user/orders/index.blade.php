@extends('layouts.app')
@section('title', __('orders.orders'))
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                @foreach (Auth::user()->getOrders() as $order)
                    <h1>{{ $order->getId() }}</h1>
                    <p>{{ $order->getTotal() }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
