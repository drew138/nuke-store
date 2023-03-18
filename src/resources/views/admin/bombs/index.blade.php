@extends('layouts.dashboard')
@section('title', __('bomb.bombs') . ' - ' . __('app.app_name'))
@section('content')
    <div class="p-4">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen px-2 lg:px-4">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex p-4">
                        <div class="w-full">
                            <form class="flex items-center" action="{{ route('admin.bombs.search') }}" method="POST"
                                enctype="multipart/form-data">
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
                                    <th scope="col" class="px-4 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['bombs'] as $bomb)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bomb->getId() }}</th>
                                        <td class="px-4 py-3">
                                            <img class="w-24 h-24 object-cover rounded"
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
                                        <td class="px-4 py-3 justify-end">
                                            
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.bombs.update', ['id' => $bomb->getId()]) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('bomb.update_bomb') }}</a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('admin.bombs.destroy', ['id' => $bomb->getId()]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('bomb.delete_bomb') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
