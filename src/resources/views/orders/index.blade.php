@extends('layouts.app')
@section('title', __('orders.index_title'))
@section('subtitle', __('orders.index_subtitle'))
@section('content')
<div class="row">
    @foreach ($data["orders"] as $order)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <p>{{ __('orders.total') }}: {{ $order->getTotal()}}
                <p />
            <p>{{ __('orders.is_shipped') }}: {{ $order->getIsShipped()? "true": "false"}}
                <p />
            <form action="{{ route('orders.destroy', ['id'=> $order->getId()]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    {{ __('orders.delete') }}
                </button>
            </form>
            <a href="{{ route('orders.show', ['id'=> $order['id']]) }}">{{__('orders.view_order')}}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
