@extends('layouts.app')
@section('import')
<link href="{{ asset('/css/home-index.css') }}" rel="stylesheet" />
@endsection
@section('title', 'Home Page - '. __('app.app_name'))
@section('content')
<div class="home-header">
    <h2>{{__('home.home_header_title')}}</h2>
</div>
@endsection
