<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
	@yield('import')
    <title>@yield('title', __('app.app_name'))</title>
</head>

<body>
    <!-- header -->
    <header class="header">
        <a class="logo" href="{{ route('home.index') }}">
            <img src="{{ asset('/images/app_logo_white.png') }}" alt="{{__('app.app_logo')}}" />
            <h1 class="app-name">{{__('app.app_name')}}</h1>
        </div>
        <nav class="nav">
            <ul class="links">
                <li><a href="{{ route('home.index') }}">{{ __('home.home') }}</a></li>
                <li><a href="{{ route('bomb.index') }}">{{ __('home.home_header_bomb') }}</a></li>
                <li><a href="{{ route('bomb.create') }}">{{ __('home.home_header_create_bomb') }}b</a></li>
            </ul>
        </nav>


    </header>

    <div>
        <h2>@yield('subtitle', '')</h2>
    </div>

    <div>
        @yield('content')
    </div>

    <footer class="footer">
        <small class="copyright">
            {{__('app.copyright')}} - <a> {{__('app.app_name')}} </a>
        </small>
    </footer>
</body>
</html>