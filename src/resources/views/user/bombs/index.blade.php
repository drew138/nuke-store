@extends('layouts.app')
@section('title', __('bomb.bombs') . ' - ' . __('app.app_name'))
@section('content')
    <div class="container mx-auto mb-[70px]">
        @if (array_key_exists('query', $data))
            <h1 class="mx-4 my-8 text-1xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl">
                {{ __('bomb.results_for') }} <span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ $data['query'] }}</span>
            </h1>
        @endif

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
                            <div class="flex items-center justify-between items-center align-middle">
                                <a href="{{ route('bombs.show', ['id' => $bomb->getId()]) }}">
                                    <h5 class="mb-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $bomb->getName() }}</h5>
                                </a>

                                <div>
                                    @if ($bomb->getStock() == 1)
                                        <p class="text-yellow-500 text-sm font-semibold">
                                            {{ $bomb->getStock() . ' ' . __('bomb.stock') }}</p>
                                    @elseif($bomb->getStock() > 1)
                                        <p class="text-green-500 text-sm font-semibold">
                                            {{ $bomb->getStock() . ' ' . __('bomb.stocks') }}</p>
                                    @else
                                        <p class="text-green-500 text-sm font-semibold">{{ __('bomb.no-stock') }}</p>
                                    @endif
                                </div>
                            </div>


                            <div class="flex items-center justify-between">
                                <span
                                    class="text-2xl font-bold text-gray-900 dark:text-white">{{ "$" . $bomb->getPrice() }}</span>
                                <form action="{{ route('shopping_cart.add') }}" method="POST">
                                    <div class="flex items-center justify-between">
                                        <input type="hidden" name="id" value="{{ $bomb->getId() }}">
                                        <input type="number" id="amount" name="amount" min="1" value="1"
                                            max="{{ $bomb->getStock() }}"
                                            class="bg-gray-50  mr-2 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="1" required>
                                        @csrf
                                        <button
                                            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            {{ __('shopping_cart.add') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($data['bombs']->hasPages())
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ __('pagination.showing') }}
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ $data['bombs']->firstItem() }}</span>
                            {{ __('pagination.to') }}
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ $data['bombs']->lastItem() }}</span>
                            {{ __('pagination.of') }}
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $data['bombs']->total() }}</span>
                            {{ __('pagination.results') }}
                        </p>
                    </div>

                    <ul class="inline-flex items-stretch -space-x-px">
                        @if ($data['bombs']->appends(request()->query())->onFirstPage())
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
                                <a href="{{ $data['bombs']->previousPageUrl() }}"
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

                        @if ($data['bombs']->hasMorePages())
                            <li>
                                <a href="{{ $data['bombs']->appends(request()->query())->nextPageUrl() }}" rel="next"
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
