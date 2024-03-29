@extends('layouts.dashboard')
@section('title', __('reviews.review_list'))
@section('content')
    <div class="pb-4">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-auto max-w-screen px-2 lg:px-4">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.id') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.title') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.description') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.image') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.is_verified') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.rating') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.user') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('reviews.bomb') }}</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['reviews'] as $review)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $review->getId() }}</th>
                                        <th
                                            scope="row"class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $review->getTitle() }}</th>
                                        <td class="px-4 py-3">{{ $review->getDescription() }}</td>
                                        <td class="px-4 py-3">
                                            <img class="w-10 h-10 object-cover rounded"
                                                src="{{ URL::asset($review->getImage()) }}">
                                        </td>
                                        @if ($review->getIsVerified())
                                            <td class="px-4 py-3">{{ __('reviews.yes') }}</td>
                                        @else
                                            <td class="px-4 py-3">{{ __('reviews.no') }}</td>
                                        @endif
                                        <td class="px-4 py-3">
                                            <div class="flex items-center mb-1">
                                                @foreach (range(1, 5) as $number)
                                                    @if ($number > $review->getRating())
                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @else
                                                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>

                                        <td class="px-4 py-3">{{ $review->getUser()->getName() }}</td>
                                        <td class="px-4 py-3">{{ $review->getBomb()->getName() }}</td>
                                        <td class="px-4 py-3">
                                            @if ($review->getIsVerified())
                                                <form
                                                    action="{{ route('admin.reviews.unverify', ['id' => $review->getId()]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="whitespace-nowrap w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('reviews.unverify') }}</button>
                                                </form>
                                            @else
                                                <form
                                                    action="{{ route('admin.reviews.verify', ['id' => $review->getId()]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="whitespace-nowrap w-full text-white bg-gradient-to-br from-green-600 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('reviews.verify') }}</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="px-4">
                                            <form action="{{ route('admin.reviews.destroy', ['id' => $review->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="whitespace-nowrap text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{ __('reviews.delete_review') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($data['reviews']->hasPages())
                        <nav
                            class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('pagination.showing') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['reviews']->firstItem() }}</span>
                                        {{ __('pagination.to') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['reviews']->lastItem() }}</span>
                                        {{ __('pagination.of') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['reviews']->total() }}</span>
                                        {{ __('pagination.results') }}
                                    </p>
                                </div>

                                <ul class="inline-flex items-stretch -space-x-px">
                                    @if ($data['reviews']->onFirstPage())
                                        <li>
                                            <p
                                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Previous</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </p>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $data['reviews']->previousPageUrl() }}"
                                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Previous</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    @endif

                                    @if ($data['reviews']->hasMorePages())
                                        <li>
                                            <a href="{{ $data['reviews']->nextPageUrl() }}" rel="next"
                                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Next</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <p
                                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Next</span>
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </p>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
