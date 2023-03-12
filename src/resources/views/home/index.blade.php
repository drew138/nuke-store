@extends('layouts.app')
@section('title', __('home.home') . ' - ' . __('app.app_name'))
@section('content')
    <div class="w-full h-[calc(100vh-140px)] bg-[url('/images/home_background.jpg')] bg-center bg-cover">
        <div class="p-8 w-full h-full bg-gradient-to-r from-[#0f0c29]/80 to-[#24243e]/80 flex items-center justify-center">
            <div class="max-w-4xl">
                <h1 class="mb-4 text-4xl text-center font-extrabold text-gray-900 dark:text-white md:text-6xl lg:text-8xl">
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ __('home.home_header_title') }}</span>
                </h1>
                <p class="text-lg font-normal text-center text-gray-500 lg:text-4xl dark:text-gray-100">
                    {{ __('home.home_header_subtitle') }}</p>
            </div>
        </div>
    </div>
@endsection
