@extends('layouts.app')
@section('title', __('bomb.bombs') . ' - ' . __('app.app_name'))
@section('content')
    <div class="container mx-auto mb-[70px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($data['bombs'] as $bomb)
                <div class="p-4 flex justify-center">
                    <div
                        class="w-full max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('bombs.show', ['id' => $bomb->getId()]) }}">
                            <img class="mb-4 rounded-t-lg object-cover h-72 w-full"
                                src="{{ URL::asset($bomb->getImage()) }}" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="{{ route('bombs.show', ['id' => $bomb->getId()]) }}">
                                <h5 class="mb-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $bomb->getName() }}</h5>
                            </a>
                            
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-2xl font-bold text-gray-900 dark:text-white">{{ "$" . $bomb->getPrice() }}</span>
                                <form action="{{ route('shopping_cart.add') }}"
                                    method="POST">
                                    @csrf
                                    <button
                                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ __('shopping_cart.add') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
