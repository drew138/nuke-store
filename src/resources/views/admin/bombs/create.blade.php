@extends('layouts.dashboard')
@section('title', __('bomb.create_bomb') . ' - ' . __('app.app_name'))
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

            <form class="space-y-6" method="POST" action="{{ route('bombs.save') }}" enctype="multipart/form-data">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                    {{ __('bomb.create_bomb') }}</h5>

                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_name') }}</label>
                    <input type="text" name="name" id="name"
                        placeholder="{{ __('bomb.enter_name_placeholder') }}" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_type') }}</label>
                    <select id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_type_placeholder') }}</option>
                        <option value="atomic_bomb">{{ __('bomb.atomic_bomb') }}</option>
                        <option value="hydrogen_bomb">{{ __('bomb.hydrogen_bomb') }}</option>
                        <option value="neutron_bomb">{{ __('bomb.neutron_bomb') }}</option>
                        <option value="dirty_bomb">{{ __('bomb.dirty_bomb') }}</option>
                        <option value="cobalt_bomb">{{ __('bomb.cobalt_bomb') }}</option>
                        <option value="backpack_nuke">{{ __('bomb.backpack_nuke') }}</option>
                    </select>
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_price') }}</label>
                    <input type="number" name="price" id="price"
                        placeholder="{{ __('bomb.enter_price_placeholder') }}" value="{{ old('price') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="location_country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_location_country') }}</label>
                    <select id="location_country" name="location_country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_location_country_placeholder') }}
                        </option>
                        @foreach (__('countries') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="manufacturing_country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_manufacturing_country') }}</label>
                    <select id="manufacturing_country" name="manufacturing_country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_manufacturing_country_placeholder') }}
                        </option>
                        @foreach (__('countries') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_stock') }}</label>
                    <input type="number" name="stock" id="stock"
                        placeholder="{{ __('bomb.enter_stock_placeholder') }}" value="{{ old('stock') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="image">{{ __('bomb.enter_image') }}</label>
                    <input type="file" name="image" id="image" accept=".jpg,.jpeg,.bmp,.png,.gif"
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>


                <div>
                    <label for="destruction_power"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_destruction_power') }}</label>
                    <input type="number" name="destruction_power" id="destruction_power"
                        placeholder="{{ __('bomb.enter_destruction_power_placeholder') }}"
                        value="{{ old('destruction_power') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>

                <button type="submit"
                    class="w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('bomb.create_bomb') }}</button>
            </form>
        </div>
    </div>
@endsection
