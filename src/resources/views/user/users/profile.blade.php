@extends('layouts.app')
@section('title', __('users.login') . ' - ' . __('app.app_name'))
@section('content')
<div class="mx-auto max-w-6xl p-8 mb-24">
   
    <div class="mx-auto w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col items-center md:flex-row -mx-4 mx-auto">
            <img class="rounded-full w-36 h-36 object-cover" src="https://library.sportingnews.com/styles/twitter_card_120x120/s3/2022-12/Kylian%20Mbappe%20France%2012062022.jpg?itok=ctgIxoBP" alt="Extra large avatar">
            <div class="ml-0 md:ml-8 mt-4 md:mt-0 w-full">
                <h1 class="mb-4 text-3xl font-extrabold text-center md:text-left text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">
                    Kylian Mbappé</span></h1>
                <ul class="mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ __('users.dictator_of') . ' ' . 'MARACAIBO'}}</span>
                    </li>    
                    
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{'$500000000 USD!'}}</span>
                    </li>     

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{'40 bombs bought'}}</span>
                    </li>  
                </ul>
            </div>
        </div>
        <h4 class="p-2 text-2xl font-bold my-4 dark:text-white">{{'Mbappé' . __('users.user_bombs')}}</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
            <!-- ITEM -->
            <div class="p-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="object-cover h-72 w-full rounded-t-lg" src="https://www.fcbarcelona.com/fcbarcelona/photo/2022/08/02/ae5252d1-b79b-4950-9e34-6e67fac09bb0/LeoMessi20092010_pic_fcb-arsenal62.jpg" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h1 class="text-xl mb-2 font-extrabold text-center text-gray-900 dark:text-white md:text-xl lg:text-2xl"><span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">La destroza planetas</span></h1>
                        </a>
                        <h5 class="text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">250000</h5>
                        <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megatons')}}</p>
                    </div>
                </div>
            </div>
            
            <!-- ITEM -->
            <div class="p-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="object-cover h-72 w-full rounded-t-lg" src="https://www.fcbarcelona.com/fcbarcelona/photo/2022/08/02/ae5252d1-b79b-4950-9e34-6e67fac09bb0/LeoMessi20092010_pic_fcb-arsenal62.jpg" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h1 class="text-xl mb-2 font-extrabold text-center text-gray-900 dark:text-white md:text-xl lg:text-2xl"><span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">La destroza planetas</span></h1>
                        </a>
                        <h5 class="text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">250000</h5>
                        <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megatons')}}</p>
                    </div>
                </div>
            </div>

            <!-- ITEM -->
            <div class="p-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="object-cover h-72 w-full rounded-t-lg" src="https://www.fcbarcelona.com/fcbarcelona/photo/2022/08/02/ae5252d1-b79b-4950-9e34-6e67fac09bb0/LeoMessi20092010_pic_fcb-arsenal62.jpg" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h1 class="text-xl mb-2 font-extrabold text-center text-gray-900 dark:text-white md:text-xl lg:text-2xl"><span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">La destroza planetas</span></h1>
                        </a>
                        <h5 class="text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">250000</h5>
                        <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megatons')}}</p>
                    </div>
                </div>
            </div>

            <!-- ITEM -->
            <div class="p-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="object-cover h-72 w-full rounded-t-lg" src="https://www.fcbarcelona.com/fcbarcelona/photo/2022/08/02/ae5252d1-b79b-4950-9e34-6e67fac09bb0/LeoMessi20092010_pic_fcb-arsenal62.jpg" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h1 class="text-xl mb-2 font-extrabold text-center text-gray-900 dark:text-white md:text-xl lg:text-2xl"><span
                                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">La destroza planetas</span></h1>
                        </a>
                        <h5 class="text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">250000</h5>
                        <p class="text-center text-gray-500 dark:text-gray-400">{{ __('bomb.megatons')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>  

</div>
@endsection
