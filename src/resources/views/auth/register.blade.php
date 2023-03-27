@extends('layouts.app')
@section('title', __('auth.register') . ' - ' . __('app.app_name'))
@section('content')
    <div class="w-full  h-[calc(100vh-140px)] bg-[url('/images/home_background.jpg')] bg-center bg-cover">
        <div class="w-full h-full bg-gradient-to-r from-[#0f0c29]/80 to-[#24243e]/80">
            <div class="p-4 w-full flex items-center justify-center">
                <div class="w-full mb-[80px] flex flex-col justify-center items-center">
                    <h1
                        class="mb-8 text-4xl text-center font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl">
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ __('users.register') }}</span>
                    </h1>
                    <div
                        class="backdrop-blur-sm w-full max-w-2xl p-4 mb-4 bg-white/50 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800/50 dark:border-gray-700">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('users.name') }}</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    value="{{ old('name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ __('users.name_placeholder') }}">
                            </div>
                            <div class="mb-6">
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.country') }}</label>
                                <select id="country" name="country"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option disabled selected value>{{ __('users.country_placeholder') }}</option>
                                    @foreach (CountriesEnum::getValues() as $value)
                                        @if (old('country') == $value)
                                            <option selected value="{{ $value }}">{{ __('countries.' . $value) }}</option>
                                        @else
                                            <option value="{{ $value }}">{{ __('countries.' . $value) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ __('users.email_placeholder') }}" required autocomplete="email">
                            </div>
                            <div class="mb-6">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.password_name') }}</label>
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ __('users.password_placeholder') }}">
                            </div>
                            <div class="mb-6">
                                <label for="confirm-password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.confirm_password') }}</label>
                                <input type="password" id="confirm-password" name="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ __('users.password_placeholder') }}">
                            </div>
                            <button type="submit"
                                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('auth.register') }}</button>
                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="backdrop-blur-sm w-full max-w-2xl bg-white/50 border border-gray-200 rounded-lg shadow flex p-4 text-sm text-red-800 rounded-lg dark:bg-gray-800/50 dark:border-gray-700 dark:text-red-400"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 000-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <span class="font-medium">{{__('app.errors')}}</span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
