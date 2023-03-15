@extends('layouts.dashboard')
@section('title', $data["review"]->getTitle())
@section('subtitle', $data["review"]->getTitle())
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
          <p>{{ __("reviews.rating") }}: {{ $data["review"]->getRating() }}</p>
          <p>{{ __("reviews.image") }}: {{ $data["review"]->getImage() }}</p>
          <p>{{ __("reviews.description") }}: {{ $data["review"]->getDescription() }}</p>
          <p>{{ __("reviews.is_verified") }}: {{ $data["review"]->getIsVerified() }}</p>
          <form action="{{ route('reviews.destroy', ['id'=> $data['review']->getId()]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
              {{ __('reviews.delete') }}
            </button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
