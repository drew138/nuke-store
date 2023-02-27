@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create bomb</div>
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
                            <input type="text" class="form-control mb-2" placeholder="Enter name"                                name="name"                  value="{{ old('name') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter type"                                name="type"                  value="{{ old('type') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter price in dollars (USD)"              name="price"                 value="{{ old('price') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter location country"                    name="location_country"      value="{{ old('location_country') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter manufacturing country"               name="manufacturing_country" value="{{ old('manufacturing_country') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter stock"                               name="stock"                 value="{{ old('stock') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter an url with the bomb image"          name="image"                 value="{{ old('image') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter destruction power in megatons (Mt)"  name="destruction_power"     value="{{ old('destruction_power') }}" />
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection