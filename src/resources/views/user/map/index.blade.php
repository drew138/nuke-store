@extends('layouts.app')
@section('import')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['geochart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var countries = [
                @foreach ($data as $country => $destructionPower)
                    ['{{ $country }}', parseInt('{{ $destructionPower }}')],
                @endforeach
            ];
            console.log(countries);
            var data = google.visualization.arrayToDataTable([
                ['Country', 'Destruction Power'],
                ...countries
            ]);

            var options = {
                sizeAxis: {
                    minValue: 0,
                    maxValue: 100
                },
                colorAxis: {
                    colors: ['#bef264', '#365314']
                },
                backgroundColor: '#111827',
                datalessRegionColor: '#334155',

            };

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
@section('title', __('home.home_header_map'). ' - ' . __('app.app_name'))
@section('content')

    <div id="regions_div" class="w-full h-[calc(100vh-140px)] py-4"></div>
@endsection
