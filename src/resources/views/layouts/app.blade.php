<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    @yield('import')
    <title>@yield('title', __('app.app_name'))</title>
</head>

<body class="bg-gray-900">
    <!-- header -->
    <header>
        <nav class="sticky w-full top-0 bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded
			dark:bg-gray-800">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="{{ route('home.index') }}" class="flex items-center">
                    <img src="{{ asset('/images/app_logo_white.png') }}" class="h-6 mr-3
						sm:h-9"
                        alt="Nukestore Logo" />
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap
						dark:text-white">{{ __('app.app_name') }}</span>
                </a>

                <div class="flex md:order-2">
                    <a href="{{ route('home.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5 " fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ml-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            2
                        </span>
                    </a>

                    <form class="relative hidden md:block">
                        <div class="flex">
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="{{ __('app.search_placeholder') }}" required>
                                <button type="submit"
                                    class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                    <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                        aria-expanded="false"
                        class="md:hidden
						text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700
						focus:outline-none focus:ring-4 focus:ring-gray-200
						dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0
							20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8
								4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0
								01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg
						md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2
						focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700
						dark:focus:ring-gray-600"
                        aria-controls="navbar-search" aria-expanded="false">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0
							20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3
								5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0
								110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                    <form class="relative mt-3 md:hidden">
                        <div class="flex">
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="{{ __('app.search_placeholder') }}" required>
                                <button type="submit"
                                    class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul
                        class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg
						bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium
						md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800
						dark:border-gray-700">
                        <li>
                            <a href="{{ route('home.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded
							hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
							md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
							dark:hover:text-white md:dark:hover:bg-transparent
							dark:border-gray-700">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('bomb.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">{{ __('home.home_header_bomb') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('bomb.create') }}"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded
								hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
								dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700
								dark:hover:text-white md:dark:hover:bg-transparent
								dark:border-gray-700">{{ __('home.home_header_create_bomb') }}</a>
                        </li>
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
            <li>
                <a href="{{ route('language.locale', ['locale' => 'en']) }}"
                    class="mr-4 hover:underline md:mr-6 ">{{ __('app.english') }}</a>
            </li>
            <li>
                <a href="{{ route('language.locale', ['locale' => 'ru']) }}"
                    class="mr-4 hover:underline md:mr-6">{{ __('app.russian') }}</a>
            </li>
        </ul>
    </footer>
</body>

</html>
