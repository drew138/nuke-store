@extends('layouts.app')
@section('title',    $data["title"])
@section('subtitle', $data["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$data['bomb']->getImage()}}" class="img-fluid rounded-start"> 
        </div>
        
        <div class="col-md-8">
            <div class="card-body">
                @if ( $data["bomb"]->getStock()  > 0)
                    <h5 style="color: green" class="card-title">
                        {{ $data["bomb"]->getName() }} 
                    </h5>
                @else
                    <h5 style="color: red" class="card-title">
                        {{ $data["bomb"]->getName() }} 
                    </h5>
                @endif
                <p class="card-text">${{ $data["bomb"]->getPrice() }}</p>
                <form action="{{ route('bomb.destroy', ['id'=> $data['bomb']->getId()]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        {{__('bomb-show.delete_bomb')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection