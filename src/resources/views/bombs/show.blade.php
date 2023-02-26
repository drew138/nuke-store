@extends('layouts.app')
@section('title',    $data["title"])
@section('subtitle', $data["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$data['bomb']['images'][0]}}" class="img-fluid rounded-start"> 
        </div>
        
        <div class="col-md-8">
            <div class="card-body">
                @if ( $data["bomb"]["price"]  >= 100)
                    <h5 style="color: red" class="card-title">
                        {{ $data["bomb"]["name"] }} 
                    </h5>
                @else
                    <h5 style="color: green" class="card-title">
                        {{ $data["bomb"]["name"] }} 
                    </h5>
                @endif
                <p class="card-text">${{ $data["bomb"]["price"] }}</p>
                <!--<button href="{{ route('bomb.destroy') }}" type="button" class="btn btn-danger">Danger</button>-->
            </div>
        </div>
    </div>
</div>
@endsection