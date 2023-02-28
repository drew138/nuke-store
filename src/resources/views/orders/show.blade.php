@extends('layouts.app')
@section('title', __('orders.show_title'))
@section('subtitle', __('orders.show_subtitle'))
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <p>{{__('orders.total') }}: {{ $data["order"]->getTotal()}}
                    <p />
                <p>{{__('orders.is_shipped') }}: {{ $data["order"]->getIsShipped()? "true": "false"}}
                    <p />
            </div>
        </div>
    </div>
</div>
@endsection
