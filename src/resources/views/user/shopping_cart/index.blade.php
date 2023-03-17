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

        <a type="button" href="#"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{ __('shopping_cart.purchase_order') }}</a>
    </div>
@endsection
