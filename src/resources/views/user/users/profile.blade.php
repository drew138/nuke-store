@extends('layouts.app')
@section('title', $data['user']->getName() . ' - ' . __('app.app_name'))
@section('content')
    <div class="mx-auto max-w-6xl p-8 mb-24">
        <div
            class="flex justify-center items-center flex-col mx-auto w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center md:flex-row -mx-4 mx-auto">
                <img class="rounded-full w-36 h-36 aspect-square object-cover "
                    src="{{ URL::asset($data['user']->getProfilePicture()) }}" alt="Extra large avatar">
                <div class="ml-0 md:ml-8 mt-4 md:mt-0 w-full">
                    <h1
                        class="mb-4 text-3xl font-extrabold text-center md:text-left text-gray-900 dark:text-white md:text-4xl lg:text-5xl">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">
                            {{ $data['user']->getName() }}</span>
                    </h1>
                    <ul class="mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ __('users.dictator_of') . ' ' . __('countries.' . $data['user']->getCountry()) }}</span>
                        </li>

                        @if ($data['user']->getId() == Auth::id())
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>${{ $data['user']->getBalance() }}</span>
                            </li>
                        @endif

                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @if (count($data['user']->getBombUsers()) == 1)
                                <span>{{ count($data['user']->getBombUsers()) . ' ' . __('bomb.bomb') }}</span>
                            @else
                                <span>{{ count($data['user']->getBombUsers()) . ' ' . __('bomb.bombs') }}</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            @if ($data['user']->getId() != Auth::id())
                <a href="{{ route('users.compare', ['id' => $data['user']->getId()]) }}"
                    class="content-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3  text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    <h4 class="p-2 text-xl font-bold my-4 dark:text-white">
                        {{ __('users.compare') }}
                    </h4>
                 
                </a>
            @endif

            @if (count($data['user']->getBombUsers()) > 0)
                <h4 class="p-2 text-2xl font-bold my-4 dark:text-white">
                    {{ $data['user']->getName() . __('users.user_bombs') }}
                </h4>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($data['user']->getBombUsers() as $bomb_user)
                    <div class="p-2">
                        <div
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img class="object-cover h-72 w-full rounded-t-lg" src="{{ URL::asset($bomb_user->getBomb()->getImage()) }}" />
                            <div class="p-4">
                                <h1
                                    class="text-xl mb-2 font-extrabold text-center text-gray-900 dark:text-white md:text-xl lg:text-2xl">
                                    <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ $bomb_user->getBomb()->getName() }}</span>
                                </h1>
                                <h5 class="text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $bomb_user->getBomb()->getDestructionPower() }}
                                </h5>
                                @if ($bomb_user->getBomb()->getDestructionPower() > 1)
                                    <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megatons') }}</p>
                                @else
                                    <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megaton') }}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
