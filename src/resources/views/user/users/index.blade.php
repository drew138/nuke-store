@extends('layouts.app')
@section('title', __('users.users') . ' - ' . __('app.app_name'))
@section('content')
    <div class="container mx-auto mb-[70px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($data['users'] as $user)
                <div class="p-4 flex justify-center">
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center  py-10">
                            <a class="flex flex-col items-center  py-10"
                                href="{{ route('users.profile', ['id' => $user->getId()]) }}">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
                                    src="{{ URL::asset($user->getProfilePicture()) }}" />
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->getName() }}
                                </h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('users.dictator_of') . ' ' . __('countries.' . $user->getCountry()) }}</span>
                            </a>

                            @if ($user->getId() != Auth::id())
                                <div class="flex mt-4 space-x-3 md:mt-6">
                                    <a href="{{ route('users.compare', ['id' => $user->getId()]) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ __('users.compare') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($data['users']->hasPages())
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ __('pagination.showing') }}
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ $data['users']->firstItem() }}</span>
                            {{ __('pagination.to') }}
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ $data['users']->lastItem() }}</span>
                            {{ __('pagination.of') }}
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $data['users']->total() }}</span>
                            {{ __('pagination.results') }}
                        </p>
                    </div>

                    <ul class="inline-flex items-stretch -space-x-px">
                        @if ($data['users']->onFirstPage())
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
                                <a href="{{ $data['users']->previousPageUrl() }}"
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

                        @if ($data['users']->hasMorePages())
                            <li>
                                <a href="{{ $data['users']->nextPageUrl() }}" rel="next"
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
        @endif
    </div>
@endsection
