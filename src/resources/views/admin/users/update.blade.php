@extends('layouts.dashboard')
@section('title', __('users.update_user') . ' - ' . __('app.app_name'))
@section('content')
    <div class="w-full p-4 flex flex-col justify-center items-center">
        @if (session('success'))
            <div class="w-full max-w-2xl mb-4 border border-green-600 flex p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{ session('success') }}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div
                class="w-full max-w-2xl p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">{{ __('app.errors') }}</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div
            class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form class="space-y-6" method="POST" action="{{ route('admin.users.save_update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data['user']->getId() }}">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                    {{ __('users.update_user') }}</h5>

                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('users.name') }}</label>
                    <input type="text" name="name" id="name"
                        placeholder="{{ __('users.name_placeholder') }}" value="{{ $data['user']->getName() }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="role"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('users.role') }}</label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('users.role_placeholder') }}</option>
                        @foreach (UserRoleEnum::getValues() as $value)
                            @if ($data['user']->getRole() == $value)
                                <option selected value="{{ $value }}">{{ __('users.' . $value) }}</option>
                            @else
                                <option value="{{ $value }}">{{ __('users.' . $value) }}</option> 
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="balance"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('users.balance') }}</label>
                    <input type="number" name="balance" id="balance"
                        placeholder="{{ __('users.balance_placeholder') }}" value="{{ $data['user']->getBalance() }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>

                <div>
                    <label for="country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('users.country') }}</label>
                    <select id="country" name="country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('users.country_placeholder') }}
                        </option>
                        @foreach (CountriesEnum::getValues() as $value)
                            @if ($data['user']->getCountry() == $value)
                                <option selected value="{{ $value }}">{{ __('countries.' . $value) }}</option>
                            @else
                                <option value="{{ $value }}">{{ __('countries.' . $value) }}</option> 
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('users.update_user') }}</button>
            </form>
        </div>
    </div>
@endsection
