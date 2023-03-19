@extends('layouts.dashboard')
@section('title', __('reviews.review_list'))
@section('subtitle', __('reviews.review_list'))
@section('content')
    <div class="p-4">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['users'] as $user)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->getId() }}</th>
                                        <td class="px-4 py-3">
                                            <img class="w-24 h-24 object-cover rounded-full"
                                                src="{{ URL::asset($user->getProfilePicture()) }}">
                                        </td>
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->getRole() }}</th>
                                        <td class="px-4 py-3">{{ $user->getName() }}</td>
                                        <td class="px-4 py-3">{{ $user->getEmail() }}</td>
                                        <td class="px-4 py-3">{{ __('countries.' . $user->getCountry()) }}</td>
                                        <td class="px-4 py-3">${{ $user->getBalance() }}</td>
                                        <td class="px-4 py-3">${{ Str::limit($user->getPassword(), 15) }}</td>
                                        <td class="px-4 py-3 justify-end">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('users.show_user') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.users.update', ['id' => $user->getId()]) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('users.update_user') }}</a>
                                                </li>

                                                <li>
                                                    <form
                                                        action="{{ route('admin.users.destroy', ['id' => $user->getId()]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('users.delete_user') }}</button>
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
