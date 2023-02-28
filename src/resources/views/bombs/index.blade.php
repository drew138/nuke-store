@extends('layouts.app')
@section('import')
<link href="{{ asset('/css/bomb-index.css') }}" rel="stylesheet" />
@section('title',    $data["title"])
@section('subtitle', $data["subtitle"])
@section('content')
<div class="row">
    @foreach ($data["bombs"] as $bomb) 
        <div class="col-md-4 col-lg-4 mb-3"> 
            <div class="card"> 
            <img src="{{$bomb['image']}}" class="card-img-top img-card"> 
                <div class="card-body text-center"> 
                    <a href="{{ route('bomb.show', ['id'=> $bomb['id']]) }}" 
                     class="btn bg-primary text-white">{{ $bomb["name"] }}</a> 
                </div> 
                <div class="text-center"> 
                    <p>${{ $bomb["price"] }}</p>
                </div> 
            </div> 
        </div> 
    @endforeach 
</div>
@endsection