@extends('layouts.app')
@section('title', __('users.users') . ' - ' . __('app.app_name'))
@section('content')
    <div class="container mx-auto mb-[70px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($data['users'] as $user)
                <div class="p-4 flex justify-center">
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center  py-10">
                            <a class="flex flex-col items-center  py-10"
                                href="{{ route('users.profile', ['id' => $user->getId()]) }}">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
                                    src="{{ URL::asset($user->getProfilePicture()) }}" />
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->getName() }}
                                </h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('users.dictator_of') . ' ' . __('countries.' . $user->getCountry()) }}</span>
                            </a>

                            @if ($user->getId() != Auth::id())
                                <div class="flex mt-4 space-x-3 md:mt-6">
                                    <a href="{{ route('users.compare', ['id' => $user->getId()]) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ __('users.compare') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
