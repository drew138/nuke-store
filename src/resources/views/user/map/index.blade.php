<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['geochart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var countries = [
                @foreach($data as $country => $destructionPower)
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
                    colors: ['blue', 'red']
                }
            };

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
</body>

</html>
