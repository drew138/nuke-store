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
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.' . $character['gender']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.' . $character['species']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ __('rickandmorty.' . $character['status']) }}</span>
                                    <span
                                        class="m-0.5 bg-blue-100 whitespace-nowrap text-blue-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $character['location']['name'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">

                    <ul class="inline-flex items-stretch -space-x-px">
                        @if ($data['prev'] == "")
                            <li>
                                <p
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </p>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('rickandmorty.index', ['page' => $data['prev']]) }}"
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        @endif

                        @if ($data['next'] != "")
                            <li>
                                <a href="{{ route('rickandmorty.index', ['page' => $data['next']]) }}" rel="next"
                                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <p
                                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </p>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        

    </div>
@endsection
