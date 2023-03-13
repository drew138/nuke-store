@extends('layouts.app')
@section('title',  'SEXUAL - ' . __('app.app_name'))
@section('content')
    <div class="max-w-7xl h-[calc(100vh-230px)]  mx-auto mb-24 px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col items-center p-8 md:p-0 md:flex-row -mx-4">
            <div class="overflow-auto w-full h-[calc(100vh-230px)] max-w-full m-4 bg-white border border-green-700 rounded-lg shadow dark:bg-gray-800 dark:border-green-700">
                <div class="flex flex-col items-center pb-10">
                    <h1 class="text-4xl m-8 font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-7xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">
                        Wins</span></h1>
                    <img class="w-24 h-24 mb-3 mt-8 rounded-full shadow-lg object-cover" src="data:image/jpeg;base64,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" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Welinton Quiw</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Dictator of Colombia</span>
                </div>

                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">

                <ul class="mx-8 mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-600" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ 'Fatman bomb x3' }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-600" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ 'Fatman bomb x3' }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-600" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ 'Fatman bomb x3' }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-600" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ 'Fatman bomb x3' }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-600" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ 'Fatman bomb x3' }}</span>
                    </li>
                </ul>

                <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="flex flex-col items-center pb-10">
                    <h1 class="text-3xl m-8 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-green-800 from-green-600">
                        13050900</span></h1>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Megatons</span>
                </div>
            </div>

            <h1 class="text-9xl m-8 font-extrabold text-gray-900 dark:text-white md:text-9xl lg:text-9xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">
                VS</span></h1>

                <div class="overflow-auto w-full h-[calc(100vh-230px)] max-w-full m-4 bg-white border border-red-700 rounded-lg shadow dark:bg-gray-800 dark:border-red-600">
                    <div class="flex flex-col items-center pb-10">
                        <h1 class="text-4xl m-8 font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-7xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">
                            Loses</span></h1>
                        <img class="w-24 h-24 mb-3 mt-8 rounded-full shadow-lg object-cover" src="data:image/jpeg;base64,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" alt="Bonnie image"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Welinton Quiw</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Dictator of Colombia</span>
                    </div>
    
                    <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">
    
                    <ul class="mx-8 mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ 'Fatman bomb x3' }}</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ 'Fatman bomb x3' }}</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ 'Fatman bomb x3' }}</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ 'Fatman bomb x3' }}</span>
                        </li>
                    </ul>
    
                    <hr class="h-px m-8 bg-gray-200 border-0 dark:bg-gray-700">
    
                    <div class="flex flex-col items-center pb-10">
                        <h1 class="text-3xl m-8 font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-red-500">
                            20000</span></h1>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Megatons</span>
                    </div>
                </div>

        </div>
    </div>
@endsection