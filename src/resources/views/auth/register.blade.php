@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="{{ route('home.index') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        
        <img src="{{ asset('/images/app_logo_white.png') }}" class="h-6 mr-3
        sm:h-9" alt="Nukestore Logo" />
      {{__('app.app_name')}}
    </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('auth.register') }}
              </h1>
              <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div>
                      <label for="name" class="@error('name') is-invalid @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.name') }}</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" value="{{ old('email') }}" required autocomplete="email">
                      @error('name')
                        <br/>
                        <span class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-600 dark:text-red-400" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.email') }}</label>
                      <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                        <br/>
                        <span class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-600 dark:text-red-400" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div>
                    <label for="country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.country') }}</label>
                    <select id="country" name="country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option disabled selected value>{{ __('bomb.enter_location_country_placeholder') }}
                        </option>
                        @foreach (__('countries') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                      <label for="password" class="@error('password') is-invalid @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.password') }}</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="new-password">
                      @error('password')
                        <br/>
                        <span class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-600 dark:text-red-400"role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('auth.confirm_password') }}</label>
                      <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="new-password">
                  </div>
                  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ __('auth.register') }}</button>
              </form>
          </div>
      </div>
  </div>
</section>
@endsection
