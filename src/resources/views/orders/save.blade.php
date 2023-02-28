@extends('layouts.app')
@section('title', $data["title"])
@section('subtitle', $data["subtitle"])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <p class="lead">{{ $data["name"] }}</p>
        </div>

        <div class="col-lg-4 me-auto">
            <p class="lead">${{ $data["price"] }}</p>
        </div>
    </div>
</div>
@endsection
