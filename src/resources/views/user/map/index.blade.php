@extends('layouts.app')
@section('import')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    <script>
        var countries = [
            @foreach ($data as $country => $destructionPower)
                ['{{ $country }}', parseInt('{{ $destructionPower }}')],
            @endforeach
        ];

        drawRegionsMap(countries);
    </script>
@endsection
@section('title', __('home.home_header_map') . ' - ' . __('app.app_name'))
@section('content')
    <div id="regions_div" class="w-full h-[calc(100vh-140px)] py-4"></div>
@endsection
