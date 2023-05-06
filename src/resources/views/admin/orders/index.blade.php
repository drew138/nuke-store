@extends('layouts.dashboard')
@section('title', __('orders.orders') . ' - ' . __('app.app_name'))
@section('content')
    <div class="pb-4">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-auto max-w-screen px-2 lg:px-4">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.id') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.is_shipped') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.user') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.bombs') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.total') }}</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['orders'] as $order)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->getId() }}</th>
                                        @if ($order->getIsShipped())
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ __('orders.yes') }}</td>
                                        @else
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ __('orders.no') }}</td>
                                        @endif

                                        <td class="px-4 py-3">{{ $order->getUser()->getName() }}</td>
                                        <td class="px-4 py-3">
                                            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                                                @foreach ($order->getBombOrders() as $bomb_order)
                                                    <li class="flex items-center space-x-3">
                                                        <svg class="flex-shrink-0 w-5 h-5 text-blue-500 dark:text-blue-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span><b>(x{{ $bomb_order->getAmount() }})
                                                            </b>{{ $bomb_order->getBomb()->getName() }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="px-4 py-3">${{ $order->getTotal() }}</td>
                                        <td class="px-4 py-3">
                                            @if ($order->getIsShipped())
                                                <form
                                                    action="{{ route('admin.orders.cancel_ship', ['id' => $order->getId()]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="whitespace-nowrap w-full text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{ __('orders.cancel_ship') }}</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.orders.ship', ['id' => $order->getId()]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="whitespace-nowrap w-full text-white bg-gradient-to-br from-green-600 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('orders.ship') }}</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($data['orders']->hasPages())
                        <nav
                            class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('pagination.showing') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['orders']->firstItem() }}</span>
                                        {{ __('pagination.to') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['orders']->lastItem() }}</span>
                                        {{ __('pagination.of') }}
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $data['orders']->total() }}</span>
                                        {{ __('pagination.results') }}
                                    </p>
                                </div>

                                <ul class="inline-flex items-stretch -space-x-px">
                                    @if ($data['orders']->onFirstPage())
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
                                            <a href="{{ $data['orders']->previousPageUrl() }}"
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

                                    @if ($data['orders']->hasMorePages())
                                        <li>
                                            <a href="{{ $data['orders']->nextPageUrl() }}" rel="next"
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
