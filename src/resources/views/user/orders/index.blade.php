@extends('layouts.app')
@section('title', __('orders.your_orders') . ' - ' . __('app.app_name'))
@section('content')
    <div class="p-4">
        <section class="bg-gray-50 mb-24 dark:bg-gray-900 p-3 sm:p-5">

            <div class="mx-auto max-w-7xl px-2 lg:px-4">
                @if (session('success'))
                    <div class="w-full mb-4 border border-green-600 flex p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">{{ session('success') }}
                        </div>
                    </div>
                @endif
                <h1 class="mb-12 text-4xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ __('orders.your_orders') }}</span>
                </h1>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.id') }}</th>
                                    <th scope="col" class="px-4 py-3">{{ __('orders.is_shipped') }}</th>
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
                                        <td class="px-4 py-3 text-right">
                                            <form action="{{ route('orders.download', ['id' => $order->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                <button
                                                    class="whitespace-nowrap text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('orders.download_pdf') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
