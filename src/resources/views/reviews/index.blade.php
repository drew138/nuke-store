@extends('layouts.app')
@section('title', __("reviews.review_list") )
@section('subtitle', __("reviews.review_list"))
@section('content')
<div class="row">
  @foreach ($data["reviews"] as $review)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">

        <a href="{{ route('reviews.show', ['id'=> $review->getId()]) }}"
          class="btn bg-primary text-white">{{ $review->getId() }}. {{ $review->getTitle() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
