<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        @import url("../css/main-style.css");
    </style>
    <script src="../js/main-script.js"></script>
</head>

<body>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'></script>
  
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
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
                   
                        <a href="../index.php"  style="vertical-align:middle"><span class="ion-ios-home-outline"><img src="../icons/sand.png" height="27px" width="27px" ></span>Polveri sottili</a>
                        <a href="#alarm"><span class="ion-ios-list-outline"><img src="../icons/thermometer.png" height="27px" width="27px" ></span>Temperatura</a>
                        <a href="#compose"><span class="ion-ios-compose-outline"><img src="../icons/humidity.png" height="27px" width="27px" ></span> Umidità</a>
                        
                        <a href="#chats"><span class="ion-ios-chatboxes-outline"><img src="../icons/line-dot-chart.png" height="27px" width="27px" ></span>Grafici e statistiche</a>
                        <a href="historic.php"><span class="ion-ios-chatboxes-outline"><img src="../icons/clock.png" height="27px" width="27px" ></span>Dati storici</a>
                        <a href="#chats"><span class="ion-ios-chatboxes-outline"><img src="../icons/information.png" height="27px" width="27px" ></span> Info</a>
                    </div>
                </div>
            </div>
            <div class="content">






            </div>
            <div class="nav">
                <a href="../index.php" class="nav-item nav-count-1"><img src="../icons/sand.png" height="27px" width="27px" ><span class="invisible"></span></a>
                <a href="#" class="nav-item nav-count-2"><img src="../icons/thermometer.png" height="27px" width="27px" ><span class="invisible"></span></a>
                <a href="#" class="nav-item nav-count-3"><img src="../icons/humidity.png" height="27px" width="27px" ><span class="invisible"></span></a>
                <a href="#" class="nav-item nav-count-4"><img src="../icons/line-dot-chart.png" height="27px" width="27px" ><span class="invisible"></span></a>
                <a href="#toggle" class="mask"><img src="../icons/plus.png" height="27px" width="27px" style="margin-top:18%;"></a>
            </div>
        </div>
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2ltMXBpc29uaSIsImEiOiJjazFscjg0NmwwODIyM2NwY3FnM2x3NnQ0In0.5T7HYABvQAgd355Ybcux7A';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v10',
            center: [11, 46],
            zoom: 7,
        });

       
        map.addControl(new mapboxgl.NavigationControl());

        map.on('load', function() {
            // Add a geojson point source.
            // Heatmap layers also work with a vector tile source.
            map.addSource('earthquakes', {
                "type": "geojson",
                "data": "earthquakes.geojson"
            });

            map.addLayer({
                "id": "earthquakes-heat",
                "type": "heatmap",
                "source": "earthquakes",
                "maxzoom": 9,
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
                "id": "earthquakes-point",
                "type": "circle",
                "source": "earthquakes",
                "minzoom": 7,
                "paint": {
                    // Size circle radius by earthquake magnitude and zoom level
                    "circle-radius": [
                        "interpolate",
                        ["linear"],
                        ["zoom"],
                        7, [
                            "interpolate",
                            ["linear"],
                            ["get", "mag"],
                            1, 1,
                            6, 4
                        ],
                        16, [
                            "interpolate",
                            ["linear"],
                            ["get", "mag"],
                            1, 5,
                            6, 50
                        ]
                    ],
                    // Color circle by earthquake magnitude
                    "circle-color": [
                        "interpolate",
                        ["linear"],
                        ["get", "mag"],
                        1, "rgba(33,102,172,0)",
                        2, "rgb(103,169,207)",
                        3, "rgb(209,229,240)",
                        4, "rgb(253,219,199)",
                        5, "rgb(239,138,98)",
                        6, "rgb(178,24,43)"
                    ],
                    "circle-stroke-color": "white",
                    "circle-stroke-width": 1,
                    // Transition from heatmap to circle layer by zoom level
                    "circle-opacity": [
                        "interpolate",
                        ["linear"],
                        ["zoom"],
                        7, 0,
                        8, 1
                    ]
                }
            }, 'waterway-label');
        });
    </script>
</body>

</html>