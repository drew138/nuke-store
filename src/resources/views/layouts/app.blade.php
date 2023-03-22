<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    @yield('import')
    <title>@yield('title', __('app.app_name'))</title>
</head>

<body class="bg-gray-900">
    <!-- header -->
    <header>
        <nav class="sticky w-full top-0 z-50 bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded
			dark:bg-gray-800">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="{{ route('home.index') }}" class="flex items-center">
                    <img src="{{ asset('/images/app_logo_white.png') }}" class="h-6 mr-3
						sm:h-9" />
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap hidden lg:block
						dark:text-white">{{ __('app.app_name') }}</span>
                </a>


                <div class="flex md:order-2">
                    <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                        aria-expanded="false"
                        class="md:hidden
                                text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700
                                focus:outline-none focus:ring-4 focus:ring-gray-200
                                dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">

                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>
                    @auth
                        <a href="{{ route('shopping_cart.index') }}"
                            class="hidden md:flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5 " fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                            @if (is_null(session()->get('shopping_cart')))
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ml-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">0</span>
                            @else
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ml-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">{{ count(session()->get('shopping_cart')) }}</span>
                            @endif
                        </a>

                        <form class="w-full relative hidden md:flex" action="{{ route('bombs.search') }}" method="POST">
                            @csrf
                            <div class="flex">
                                <div class="relative h-full w-full">
                                    <input type="search" id="query" name="query"
                                        class="block p-3 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="{{ __('app.search_placeholder') }}" required>
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-3 text-sm font-medium text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-r-lg border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>



                        @if (Auth::user()->getBalance() > 2000)
                            <div
                                class="hidden md:flex flex-col justify-center ml-2 text-white bg-gradient-to-br from-green-600 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3  text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <p class="text-center">${{ Auth::user()->getBalance() }}</p>
                            </div>
                        @elseif (Auth::user()->getBalance() > 1000)
                            <div
                                class="hidden md:flex flex-col justify-center ml-2 text-white bg-gradient-to-br from-yellow-600 to-yellow-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                ${{ Auth::user()->getBalance() }}
                            </div>
                        @else
                            <div
                                class="hidden md:flex flex-col justify-center ml-2 text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                ${{ Auth::user()->getBalance() }}
                            </div>
                        @endif

                        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                            data-dropdown-placement="bottom-start"
                            class="w-11 h-11 ml-2  p-1 object-cover aspect-square rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                            src="{{ URL::asset(Auth::user()->getProfilePicture()) }}">

                        <!-- Dropdown menu -->
                        <div id="userDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{ Auth::user()->getName() }}</div>
                                <div class="font-medium truncate">{{ Auth::user()->getEmail() }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                                <li>
                                    <a href="{{ route('users.profile', ['id' => Auth::id()]) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('users.profile') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('orders.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('orders.orders') }}</a>
                                </li>
                                <li>
                                    <form id="logout" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a role="button"onclick="document.getElementById('logout').submit();"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('auth.logout') }}</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>




                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                    @auth
                        <form class="relative mt-3 md:hidden">
                            <div class="flex">
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown"
                                        class="block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="{{ __('app.search_placeholder') }}" required>
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-r-lg border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>

                    @endauth

                    <ul
                        class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg
						bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium
						md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800
						dark:border-gray-700">

                        @guest
                            <li>
                                <a class="block py-2 pl-3 pr-4 text-gray-700 rounded
                        hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
                        dark:hover:text-white md:dark:hover:bg-transparent
                        dark:border-gray-700"
                                    href="{{ route('login') }}">{{ __('auth.login') }}</a>
                            </li>
                            <li>
                                <a class="block py-2 pl-3 pr-4 text-gray-700 rounded
                        hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
                        dark:hover:text-white md:dark:hover:bg-transparent
                        dark:border-gray-700"
                                    href="{{ route('register') }}">{{ __('auth.register') }}</a>
                            </li>

                        @endguest

                        @auth
                            <li>
                                <a href="{{ route('home.index') }}"
                                    class="block py-2 pl-3 pr-4 text-gray-700 rounded
							hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
							md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
							dark:hover:text-white md:dark:hover:bg-transparent
							dark:border-gray-700">{{ __('home.home') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('bombs.index') }}"
                                    class="block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">{{ __('home.home_header_bomb') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('map.index') }}"
                                    class="block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">{{ __('home.home_header_map') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('shopping_cart.index') }}"
                                    class=" block md:hidden  block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">{{ __('shopping_cart.shopping_cart') }}</a>
                            </li>
                            <li>
                                <p
                                    class=" block md:hidden  block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">
                                    ${{ Auth::user()->getBalance() }}</p>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>

    <footer
        class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">{{ __('app.copyright') }}
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            @foreach (LanguageEnum::getValues() as $value)
                <li>
                    <a href="{{ route('language.locale', ['locale' => $value]) }}"
                        class="mr-4 hover:underline md:mr-6 ">{{ __('app.' . $value) }}</a>
                </li>
            @endforeach
        </ul>
    </footer>
</body>

</html>
