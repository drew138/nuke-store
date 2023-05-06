@extends('layouts.dashboard')
@section('title', __('bomb.bombs') . ' - ' . __('app.app_name'))
@section('content')
    <div class="pb-4">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-auto max-w-screen px-2 lg:px-4">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex p-4">
                        <div class="w-full">
                            <form class="flex items-center" action="{{ route('admin.bombs.search', ['query' => ' ']) }}"
                                method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="relative w-full">
                                    <input type="search" id="query" name="query"
                                        class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="{{ __('app.search_placeholder') }}" required>
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-r-lg border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('admin.bombs.create') }}" type="button"
                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>{{ __('bomb.add_bomb') }}
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.id') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.image') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.name') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.type') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.manufacturing_country') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.location_country') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.price') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.stocks') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('bomb.destruction_power') }}</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['bombs'] as $bomb)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bomb->getId() }}</th>
                                        <td class="px-4 py-3">
                                            <img class="w-10 h-10 aspect-square object-cover rounded"
                                                src="{{ URL::asset($bomb->getImage()) }}">
                                        </td>
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bomb->getName() }}</th>
                                        <td class="px-4 py-3">{{ __('bomb.' . $bomb->getType()) }}</td>
                                        <td class="px-4 py-3">{{ __('countries.' . $bomb->getManufacturingCountry()) }}
                                        </td>
                                        <td class="px-4 py-3">{{ __('countries.' . $bomb->getLocationCountry()) }}</td>
                                        <td class="px-4 py-3">${{ $bomb->getPrice() }}</td>
                                        <td class="px-4 py-3">{{ $bomb->getStock() }}</td>
                                        <td class="px-4 py-3">{{ $bomb->getDestructionPower() }} Mt</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.bombs.update', ['id' => $bomb->getId()]) }}"
                                                class="whitespace-nowrap text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('bomb.update_bomb') }}</a>
                                        </td>
                                        <td class="px-4">
                                            <form action="{{ route('admin.bombs.destroy', ['id' => $bomb->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="whitespace-nowrap text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{ __('bomb.delete_bomb') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($data['bombs']->hasPages())
                        <nav
                            class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
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
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['bombs']->total() }}</span>
                                        {{ __('pagination.results') }}
                                    </p>
                                </div>

                                <ul class="inline-flex items-stretch -space-x-px">
                                    @if ($data['bombs']->appends(request()->query())->onFirstPage())
                                        <li>
                                            <p
                                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Previous</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    @endif

                                    @if ($data['bombs']->hasMorePages())
                                        <li>
                                            <a href="{{ $data['bombs']->appends(request()->query())->nextPageUrl() }}"
                                                rel="next"
                                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Next</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
            </div>
        </section>
    </div>
@endsection
