function drawRegionsMap(countries) {
    google.charts.load('current', {
        'packages': ['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    });
    google.charts.setOnLoadCallback(function() {
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
    });
}