@extends('layouts.app')
@section('title', 'Compare - ' . __('app.app_name'))
@section('content')
    <div class="max-w-7xl h-full mx-auto mb-20 px-4 sm:px-6 lg:px-8">
        <div class="flex  flex-col items-center px-4 pt-4 pb-24 md:p-4 md:flex-row">
            @if (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                <div class="overflow-auto w-full max-w-full bg-white border border-green-700 rounded-lg shadow dark:bg-gray-800 dark:border-green-700">
            @elseif (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                <div class="overflow-auto w-full max-w-full bg-white border border-red-700 rounded-lg shadow dark:bg-gray-800 dark:border-red-700">   
            @else
                <div class="overflow-auto w-full max-w-full bg-white border border-yellow-700 rounded-lg shadow dark:bg-gray-800 dark:border-yellow-700">
            @endif
                <div class="flex flex-col items-center">
                    <h1 class="text-3xl m-8 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">
                        @if (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">{{ __('users.wins') }}</span>
                        @elseif (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">{{ __('users.loses') }}</span>
                        @else
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-yellow-600 from-yellow-500">{{ __('users.draw') }}</span>
                        @endif
                    </h1>
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
                        src="{{ URL::asset(Auth::user()->getProfilePicture()) }}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ Auth::user()->getName() }}</h5>
                    <span
                        class="text-sm text-gray-500 dark:text-gray-400">{{ __('users.dictator_of') . ' ' . __('countries.' . Auth::user()->getCountry()) }}</span>
                </div>

                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">

                <ul class="mx-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                    @foreach (Auth::user()->getBombUsers() as $bomb_users)
                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $bomb_user->getBomb()->getName() . ' (x' . $bomb_user->getAmount() . ')' }}</span>
                        </li>
                    @endforeach
                </ul>

                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="flex flex-col items-center pb-10">
                    <h1 class="text-3xl mx-8 mb-2 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl">
                        @if (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">{{ Auth::user()->getTotalMegatons() }}</span>
                        @elseif (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">{{ Auth::user()->getTotalMegatons() }}</span>
                        @else
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-yellow-600 from-yellow-500">{{ Auth::user()->getTotalMegatons() }}</span>
                        @endif
                    </h1>
                    @if (Auth::user()->getTotalMegatons() == 1)
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('bomb.megaton') }}</span>
                    @else
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('bomb.megatons') }}</span>
                    @endif
                </div>
            </div>

            <h1 class="text-9xl m-8 font-extrabold text-gray-900 dark:text-white md:text-9xl lg:text-9xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">
                    {{ __('users.vs') }}</span></h1>

            @if (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                <div class="overflow-auto w-full max-w-full bg-white border border-green-700 rounded-lg shadow dark:bg-gray-800 dark:border-green-700">
            @elseif (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                <div class="overflow-auto w-full max-w-full bg-white border border-red-700 rounded-lg shadow dark:bg-gray-800 dark:border-red-700">   
            @else
                <div class="overflow-auto w-full max-w-full bg-white border border-yellow-700 rounded-lg shadow dark:bg-gray-800 dark:border-yellow-700">
            @endif
                <div class="flex flex-col items-center">
                    <h1 class="text-3xl m-8 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">
                        @if (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">{{ __('users.wins') }}</span>
                        @elseif (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">{{ __('users.loses') }}</span>
                        @else
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-yellow-600 from-yellow-500">{{ __('users.draw') }}</span>
                        @endif
                    </h1>
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
                        src="{{ URL::asset($data['user']->getProfilePicture()) }}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $data['user']->getName() }}</h5>
                    <span
                        class="text-sm text-gray-500 dark:text-gray-400">{{ __('users.dictator_of') . ' ' . __('countries.' . $data['user']->getCountry()) }}</span>
                </div>
                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">
                <ul class="mx-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                    @foreach ($data['user']->getBombUsers() as $bomb_user)
                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $bomb_user->getBomb()->getName() . ' (x' . $bomb_user->getAmount() . ')' }}</span>
                        </li>
                    @endforeach
                </ul>
                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="flex flex-col items-center pb-10">
                    <h1 class="text-3xl mx-8 mb-2 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl">
                        @if (Auth::user()->getTotalMegatons() < $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">{{ $data['user']->getTotalMegatons() }}</span>
                        @elseif (Auth::user()->getTotalMegatons() > $data['user']->getTotalMegatons())
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">{{ $data['user']->getTotalMegatons() }}</span>
                        @else
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-yellow-600 from-yellow-500">{{ $data['user']->getTotalMegatons() }}</span>
                        @endif
                    </h1>
                    @if ($data['user']->getTotalMegatons() == 1)
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('bomb.megaton') }}</span>
                    @else
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('bomb.megatons') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
