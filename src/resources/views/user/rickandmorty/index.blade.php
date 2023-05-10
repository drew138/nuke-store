@extends('layouts.app')
@section('title', __('rickandmorty.rickandmorty') . ' - ' . __('app.app_name'))
@section('content')
    <div class="container mx-auto mb-[70px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($data['characters'] as $character)
                <div class="p-4 h-full">
                    <div
                        class="bg-white h-full border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex h-full">
                            <div class="flex w-full  flex-col p-4 items-center">
                                <img class="w-48 h-48  rounded-lg" src="{{ URL::asset($character['image']) }}" />

                            </div>
                            <div class="flex flex w-full flex-col p-4">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $character['name'] }}
                                </h5>
                                <div class="flex flex-wrap">
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.'.$character['gender']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.'.$character['species']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.'.$character['status']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $character['location']['name'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
