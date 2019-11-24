<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <title>Create a time slider</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        @import url("../css/main-style.css");
    </style>
    <script src="../js/main-script.js"></script>
</head>

<body>
    <style>
        .map-overlay {
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            position: absolute;
            width: 40%;
            top: 0;
            right: 0;
            padding: 10px;
            z-index: 30;
        }

        .map-overlay .map-overlay-inner {
            background-color: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.20);
            border-radius: 3px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .map-overlay h2 {
            line-height: 24px;
            display: block;
            margin: 0 0 10px;
        }

        .map-overlay .legend .bar {
            height: 10px;
            width: 100%;
            background: linear-gradient(to right, rgb(103, 169, 207), rgb(178, 24, 43));
        }

        .map-overlay input {
            background-color: transparent;
            display: inline-block;
            width: 100%;
            position: relative;
            margin: 0;
            cursor: ew-resize;
        }
    </style>

    <div class="mobile-wrap">
        <div id="map"></div>
        <!-- <div class="map" id="map"></div> -->
        <div class="mobile clearfix">
            <div class="header primop" style="z-index:20">
                <span class="ion-ios-navicon pull-left"><i></i></span>


            </div>
            <div class="sidebar primop">
                <div class="sidebar-overlay"></div>
                <div class="sidebar-content">
                    <div class="top-head">
                        <div class="name">Rilevazione polveri sottili</div>

                    </div>
                    <div class="nav-left ">

                        <a href="../index.php" style="vertical-align:middle"><span class="ion-ios-home-outline"><img src="../icons/sand.png" height="27px" width="27px"></span>Polveri sottili</a>
                        <a href="temperatura.php"><span class="ion-ios-list-outline"><img src="../icons/thermometer.png" height="27px" width="27px"></span>Temperatura</a>
                        <a href="#compose"><span class="ion-ios-compose-outline"><img src="../icons/humidity.png" height="27px" width="27px"></span> Umidità</a>

                        <a href="#chats"><span class="ion-ios-chatboxes-outline"><img src="../icons/line-dot-chart.png" height="27px" width="27px"></span>Grafici e statistiche</a>
                        <a href="#chats"><span class="ion-ios-chatboxes-outline"><img src="../icons/clock.png" height="27px" width="27px"></span>Dati storici</a>
                        <a href="#chats"><span class="ion-ios-chatboxes-outline"><img src="../icons/information.png" height="27px" width="27px"></span> Info</a>
                    </div>
                </div>
            </div>
            <div class="content">






            </div>
            <div class="nav">
                <a href="../index.php" class="nav-item nav-count-1"><img src="../icons/sand.png" height="27px" width="27px"><span class="invisible"></span></a>
                <a href="temperatura.php" class="nav-item nav-count-2"><img src="../icons/thermometer.png" height="27px" width="27px"><span class="invisible"></span></a>
                <a href="#" class="nav-item nav-count-3"><img src="../icons/humidity.png" height="27px" width="27px"><span class="invisible"></span></a>
                <a href="#" class="nav-item nav-count-4"><img src="../icons/line-dot-chart.png" height="27px" width="27px"><span class="invisible"></span></a>
                <a href="#toggle" class="mask"><img src="../icons/plus.png" height="27px" width="27px" style="margin-top:18%;"></a>
            </div>
        </div>
    </div>
    <div class='map-overlay top'>
        <div class='map-overlay-inner'>
            <h2>Polveri sottili nei mesi passati</h2>
            <label id='month'></label>
            <input id='slider' type='range' min='0' max='11' step='1' value='0' />
        </div>
        <div class='map-overlay-inner'>
            <div id='legend' class='legend'>
                <div class='bar'></div>
                <div>Value</div>
            </div>
        </div>
    </div>

    <script src='//d3js.org/d3.v3.min.js' charset='utf-8'></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2ltMXBpc29uaSIsImEiOiJjazFscjg0NmwwODIyM2NwY3FnM2x3NnQ0In0.5T7HYABvQAgd355Ybcux7A';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v10',
            center: [11, 46],
            zoom: 7,
        });

        var months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        function filterBy(month) {

            var filters = ['==', 'month', month];
            map.setFilter('earthquake-circles', filters);
            map.setFilter('earthquake-labels', filters);

            // Set the label to the month
            document.getElementById('month').textContent = months[month];
        }

        map.on('load', function() {

            // Data courtesy of http://earthquake.usgs.gov/
            // Query for significant earthquakes in 2015 URL request looked like this:
            // http://earthquake.usgs.gov/fdsnws/event/1/query
            //    ?format=geojson
            //    &starttime=2015-01-01
            //    &endtime=2015-12-31
            //    &minmagnitude=6'
            //
            // Here we're using d3 to help us make the ajax request but you can use
            // Any request method (library or otherwise) you wish.
            d3.json('../earthquakes.geojson',
                function(err, data) {
                    if (err) throw err;

                    // Create a month property value based on time
                    // used to filter against.
                    data.features = data.features.map(function(d) {
                        d.properties.month = new Date(d.properties.time).getMonth();
                        return d;
                    });

                    map.addSource('earthquakes', {
                        'type': 'geojson',
                        data: data
                    });

                    // map.addLayer({
                    //     'id': 'earthquake-circles',
                    //     'type': 'circle',
                    //     'source': 'earthquakes',
                    //     'paint': {
                    //         'circle-color': [
                    //             'interpolate',
                    //             ['linear'],
                    //             ['get', 'mag'],
                    //             6, '#FCA107',
                    //             8, '#7F3121'
                    //         ],
                    //         'circle-opacity': 0.75,
                    //         'circle-radius': [
                    //             'interpolate',
                    //             ['linear'],
                    //             ['get', 'mag'],
                    //             6, 20,
                    //             8, 40
                    //         ]
                    //     }
                    // });
                    map.addLayer({
                        "id": "earthquake-circles",
                        "type": "heatmap",
                        "source": "earthquakes",
                        "maxzoom": 24,
                        "paint": {
                            // Increase the heatmap weight based on frequency and property magnitude
                            "heatmap-weight": [
                                "interpolate",
                                ["linear"],
                                ["get", "mag"],
                                0, 0,
                                6, 1
                            ],
                            // Increase the heatmap color weight weight by zoom level
                            // heatmap-intensity is a multiplier on top of heatmap-weight
                            "heatmap-intensity": [
                                "interpolate",
                                ["linear"],
                                ["zoom"],
                                0, 1,
                                9, 3
                            ],
                            // Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
                            // Begin color ramp at 0-stop with a 0-transparancy color
                            // to create a blur-like effect.
                            "heatmap-color": [
                                "interpolate",
                                ["linear"],
                                ["heatmap-density"],
                                0, "rgba(33,102,172,0)",
                                0.2, "rgb(103,169,207)",
                                0.4, "rgb(209,229,240)",
                                0.6, "rgb(253,219,199)",
                                0.8, "rgb(239,138,98)",
                                1, "rgb(178,24,43)"
                            ],
                            // Adjust the heatmap radius by zoom level
                            "heatmap-radius": [
                                "interpolate",
                                ["linear"],
                                ["zoom"],
                                0, 2,
                                9, 20
                            ],
                            // Transition from heatmap to circle layer by zoom level
                            "heatmap-opacity": [
                                "interpolate",
                                ["linear"],
                                ["zoom"],
                                7, 1,
                                9, 0
                            ],
                        }
                    }, 'waterway-label');
                    
                    map.addLayer({
                        'id': 'earthquake-labels',
                        'type': 'symbol',
                        'source': 'earthquakes',
                        'layout': {
                            'text-field': ['concat', ['to-string', ['get', 'mag']], 'm'],
                            'text-font': ['Open Sans Bold', 'Arial Unicode MS Bold'],
                            'text-size': 12
                        },
                        'paint': {
                            'text-color': 'rgba(0,0,0,0.5)'
                        }
                    });

                    // Set filter to first month of the year
                    // 0 = January
                    filterBy(0);

                    document.getElementById('slider').addEventListener('input', function(e) {
                        var month = parseInt(e.target.value, 10);
                        filterBy(month);
                    });
                });
        });
    </script>

</body>

</html>