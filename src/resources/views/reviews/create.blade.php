@extends('layouts.app')
@section("title", __("reviews.review_create"))
@section("subtitle", __("reviews.review_create"))
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create product</div>
          <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success" role="alert">
            {{session('success')}}
          </div>
          @endif
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('reviews.save') }}">
              @csrf
              <div class="form-group">
                <label for="title">{{ __("reviews.title") }}</label>
                <input type="text" class="form-control mb-2" id="title" placeholder="{{__('reviews.enter_title')}}" name="title" value="{{ old('title') }}" />
              </div>
              <div class="form-group">
                <label for="rating">{{ __("reviews.rating") }}</label>
                <input type="number" class="form-control mb-2" id="rating" placeholder="{{__('reviews.enter_rating')}}" name="rating" value="{{ old('rating') }}" />
              </div>
              <div class="form-group">
                <label for="image">{{ __("reviews.image") }}</label>
                <input type="text" class="form-control mb-2" id="image" placeholder="{{__('reviews.enter_image')}}" name="image" value="{{ old('image') }}" />
              </div>
              <div class="form-group">
                <label for="description">{{ __("reviews.description") }}</label>
                <textarea  type="text" class="form-control mb-2" id="description" placeholder="{{__('reviews.enter_description')}}" name="description" value="{{ old('description') }}"></textarea>
              </div>
              <label for="is_verified_radio">{{ __("reviews.is_verified") }}</label>
              <div class="form-check" id="is_verified_radio">
                <input class="form-check-input" type="radio" name="is_verified" id="is_verified_true" value="1" checked>
                <label class="form-check-label" for="is_verified_true">
                  {{ __("reviews.true") }}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="is_verified" id="is_verified_false" value="">
                <label class="form-check-label" for="is_verified_false">
                  {{ __("reviews.false") }}
                </label>
              </div>
              <input type="submit" class="btn btn-primary" value="Submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
