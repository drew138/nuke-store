@extends('layouts.app')
@section("title", __('orders.create_title'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('orders.create_order')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('orders.save') }}">
                        @csrf
                        <label for="color">{{__('orders.is_shipped')}}</label>
                        <select name="is_shipped" id="color">
                            <option value="1">{{__('orders.true')}}</option>
                            <option value="0">{{__('orders.false')}}</option>
                        </select>
                        <input type="text" class="form-control mb-2" placeholder="Enter total" name="total" value="{{ old('type') }}" />
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
