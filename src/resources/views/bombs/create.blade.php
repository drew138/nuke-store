@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('bomb-create.create_bomb')}}</div>
                    <div class="card-body">
                        @if(session('success'))
                            <h1>{{ session('success') }}</h1>
                        @endif
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('bomb.save') }}">
                            @csrf
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_name')}}" name="name"                  value="{{ old('name') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_type')}}" name="type"                  value="{{ old('type') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_price')}}" name="price"                 value="{{ old('price') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_location_country')}}" name="location_country"      value="{{ old('location_country') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_manufacturing_country')}}" name="manufacturing_country" value="{{ old('manufacturing_country') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_stock')}}" name="stock"                 value="{{ old('stock') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_image')}}" name="image"                 value="{{ old('image') }}" />
                            <input type="text" class="form-control mb-2" placeholder="{{__('bomb-create.enter_destruction_power')}}" name="destruction_power"     value="{{ old('destruction_power') }}" />
                            <input type="submit" class="btn btn-primary" value="{{__('bomb-create.create_bomb')}}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection