@extends('layouts.app')
@section('title', $data['bomb']->getName() . ' - ' . __('app.app_name'))
@section('content')
    <div class="max-w-7xl mx-auto mb-20 px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <figure
                    class="h-64 md:h-80 rounded-lg mb-4 transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <img class="w-full h-full object-cover rounded-lg" src="{{ URL::asset($data['bomb']->getImage()) }}">
                </figure>

                <div class="mb-4 justify-center flex items-center">
                    @foreach (range(1, 5) as $number)
                        @if ($number > $data['bomb_rating'])
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @else
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endif
                    @endforeach
                    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{ $data['bomb_rating'] }}</p>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ count($data['bomb']->getReviews()) . ' ' . __('app.reviews') }}</p>
                </div>

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

                <form method="POST" action="{{ route('reviews.save') }}"  enctype="multipart/form-data">
                    @csrf
                    <div
                        class="w-full my-4 border p-4 border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <input type="hidden" name="bomb_id" value="{{ $data['bomb']->getId() }}">
                        <h3 class="mb-4 text-xl font-bold text-center dark:text-white">{{ __('reviews.write_review') }}</h3>
                        <div class="px-4 py-2 mb-4 bg-white rounded-lg dark:bg-gray-800">
                            <input type="text" id="title" name="title"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="{{ __('reviews.enter_title') }}"></input>
                        </div>

                        <div class="px-4 py-2 mb-4 bg-white rounded-lg dark:bg-gray-800">
                            <textarea id="comment" rows="6" name="description"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="{{ __('reviews.enter_description') }}"></textarea>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="image">{{ __('reviews.enter_image') }}</label>
                            <input type="file" name="image" id="image" accept=".jpg,.jpeg,.bmp,.png,.gif"
                                class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <div>
                            <label for="rating"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('bomb.enter_type') }}</label>
                            <select id="rating" name="rating"
                                class="px-4 py-2 mb-4 bg-white rounded-lg dark:bg-gray-800 w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400">
                                <option disabled selected value>{{ __('reviews.enter_rating_placeholder') }}</option>
                                @foreach (range(1, 5) as $number)
                                    <option value="{{ $number }}">{{ $number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-between dark:border-gray-600">
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900">
                                {{ __('reviews.post_review') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="md:flex-1 px-4">
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">
                        {{ $data['bomb']->getName() }}</span></h1>

                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="font-bold text-indigo-600 text-3xl">${{ $data['bomb']->getPrice() }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        @if ($data['bomb']->getStock() == 1)
                            <p class="text-yellow-500 text-lg font-semibold">
                                {{ $data['bomb']->getStock() . ' ' . __('bomb.stock') }}</p>
                        @elseif($data['bomb']->getStock() > 1)
                            <p class="text-green-500 text-lg font-semibold">
                                {{ $data['bomb']->getStock() . ' ' . __('bomb.stocks') }}</p>
                        @else
                            <p class="text-green-500 text-lg font-semibold">{{ __('bomb.no-stock') }}</p>
                        @endif
                    </div>
                </div>

                <ul class="mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ __('bomb.location_country') . ' ' . __('countries.' . $data['bomb']->getLocationCountry()) }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ __('bomb.manufacturing_country') . ' ' . __('countries.' . $data['bomb']->getManufacturingCountry()) }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ __('bomb.' . $data['bomb']->getType()) }}</span>
                    </li>

                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>

                        @if ($data['bomb']->getDestructionPower() > 1)
                            <span>{{ __('bomb.destruction_power') . ' ' . $data['bomb']->getDestructionPower() . ' ' . __('bomb.megatons') }}</span>
                        @else
                            <span>{{ __('bomb.destruction_power') . ' ' . $data['bomb']->getDestructionPower() . ' ' . __('bomb.megaton') }}</span>
                        @endif
                    </li>
                </ul>

                <form action="{{ route('shopping_cart.add', ['id' => $data['bomb']->getId()]) }}"
                    method="POST">
                    @csrf
                    <button
                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('shopping_cart.add') }}</button>
                </form>
           
                @if (count($data['bomb']->getReviews()) > 0)
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <h3 class="mb-4 text-3xl font-bold dark:text-white">{{ __('app.reviews') }}</h3>

                    @foreach ($data['bomb']->getReviews() as $review)
                        <article>
                            <a href="{{ route('users.profile', ['id' => $review->getUser()->getId()]) }}" class="flex items-center mb-4 space-x-4">
                                <img class="w-10 h-10 rounded-full object-cover" src="{{ URL::asset($review->getUser()->getProfilePicture()) }}" alt="">
                                <div class="space-y-1 font-medium dark:text-white">
                                    <p>{{ $review->getUser()->getName() }}<p class="block text-sm text-gray-500 dark:text-gray-400">{{ __('users.dictator_of') . ' ' .  __('countries.' . $review->getUser()->getCountry())}}</p></p>
                                </div>
                            </a>
                            <div class="flex items-center mb-1">
                                @foreach (range(1, 5) as $number)
                                    @if ($number > $review->getRating())
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @else
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endif
                                @endforeach
                    
                                <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $review->getTitle() }}</h3>
                            </div>
                            <p class="mb-2 font-light text-gray-500 dark:text-gray-400">{{ $review->getDescription() }}</p>
                            @if ($review->getImage() != '')
                                <img class="w-full h-full mb-5 object-cover rounded-lg" src="{{ URL::asset($review->getImage()) }}">
                            @endif
                            <a href="#" class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read more</a>
                            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
