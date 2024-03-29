@extends('layouts.dashboard')
@section('title', __('users.users') . ' - ' . __('app.app_name'))
@section('content')
    <div class="pb-4">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-auto max-w-screen px-2 lg:px-4">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('admin.users.create') }}"
                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                {{ __('users.create_user') }}
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">{{ __('users.id') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.profile_picture') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.role') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.name') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.email') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.country') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.balance') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('users.password') }}</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['users'] as $user)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->getId() }}</th>
                                        <td class="px-4 py-3">
                                            <img class="w-10 h-10 object-cover rounded-full"
                                                src="{{ URL::asset($user->getProfilePicture()) }}">
                                        </td>
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ __('users.' . $user->getRole()) }}</th>
                                        <td class="px-4 py-3">{{ $user->getName() }}</td>
                                        <td class="px-4 py-3">{{ $user->getEmail() }}</td>
                                        <td class="px-4 py-3">{{ __('countries.' . $user->getCountry()) }}</td>
                                        <td class="px-4 py-3">${{ $user->getBalance() }}</td>
                                        <td class="px-4 py-3">${{ Str::limit($user->getPassword(), 15) }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.users.update', ['id' => $user->getId()]) }}"
                                                class="whitespace-nowrap text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('users.update_user') }}</a>
                                        </td>
                                        <td class="px-4">
                                            <form action="{{ route('admin.users.destroy', ['id' => $user->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="whitespace-nowrap text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{ __('users.delete_user') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if ($data['users']->hasPages())
                        <nav
                            class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
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
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['users']->total() }}</span>
                                        {{ __('pagination.results') }}
                                    </p>
                                </div>

                                <ul class="inline-flex items-stretch -space-x-px">
                                    @if ($data['users']->onFirstPage())
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
                                            <a href="{{ $data['users']->previousPageUrl() }}"
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

                                    @if ($data['users']->hasMorePages())
                                        <li>
                                            <a href="{{ $data['users']->nextPageUrl() }}" rel="next"
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
