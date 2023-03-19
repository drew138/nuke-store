@extends('layouts.app')
@section('title', __('shopping_cart.shopping_cart') . ' - ' . __('app.app_name'))
@section('content')
    <div class="w-full max-w-7xl mx-auto px-4 mb-24">
        <h1 class="mt-8 mb-8 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">{{ __('shopping_cart.shopping_cart') }}</span>
        </h1>
        <div class="mb-8 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('bomb.image') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('bomb.name') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('bomb.stocks') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('shopping_cart.quantity') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('bomb.price') }}
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['bombs'] as $bomb)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class=" p-4">
                                <img class="object-cover w-32 h-32 rounded-lg" src="{{ URL::asset($bomb->getImage()) }}">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $bomb->getName() }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $bomb->getStock() }}</td>
                            <td class="px-6 py-4">
                                <div>
                                    <input type="number" id="first_product" min="1" value="1" max="{{ $bomb->getStock() }}"
                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="1" required>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${{ $bomb->getPrice() }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('shopping_cart.delete', ['id' => $bomb->getId()]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ __('shopping_cart.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
        <form action="{{ route('shopping_cart.buy') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{ __('shopping_cart.purchase_order') }}</button>
        </form>
    </div>
@endsection
