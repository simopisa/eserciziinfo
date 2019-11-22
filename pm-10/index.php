<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <script src="js/main-script.js"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        @import url("css/main-style.css");
    </style>
</head>

<body>
    <!-- BUTTON SHOW/HIDE INSTRUCTION -->
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css' type='text/css' />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>



    <div class="c-mobile-view">


        <!-- CONTROLLERS -->
        <input type="checkbox" id="u-mobile__button" name="u-mobile__button">
        <input type="checkbox" id="u-topbar__button" name="u-topbar__button">
        <input type="checkbox" id="u-cards-switcher__button" name="u-cards-switcher__button">
        <input type="checkbox" id="u-cards-hide__button" name="u-cards-hide__button">
        <!-- / controllers-->

        <!-- MOBILE VIEW CONTAINER -->
        <div class="c-mobile-view__inner">
            <div id='map' style='width: 100%; height: 100%; z-index:0'></div>
            <!-- TOPBAR -->
            
                <!-- CARDS -->
                <div class="c-cards__inner linkss" >
                    <div class="c-card c-card--back">
                        <div class="c-card__details">
                            <div class="c-card__details__top">
                                <h1>Cambia visualizzazione</h1><br>
                                <a href="" >Umidità</a><br>
                                <a href="" >Temperatura</a><br>
                                <a href="" >Polveri</a>
                            </div>
                            <div class="c-card__details__bottom">current location</div>
                        </div>
                    </div>
                    <div class="c-card c-card--front">
                        <div class="c-card__details">
                            <div class="c-card__details__top">
                                <h1>Visualizzazione Polveri sottili</h1>
                                <h2 style="color:aliceblue">valore medio area</h2>
                                
                            </div>
                            <div class="c-card__details__bottom">current location</div>
                        </div>
                    </div>




                </div>
            </div>

            <!-- OVERLAY -->


            <!-- SWITCHER CARDS BUTTON -->
            <label for="u-cards-switcher__button" class="c-button c-switcher__button">
                <span class="c-switcher__button--cards fa fa-refresh"><img src="icons/refresh.png" height="20px" width="20px"></span>
            </label>

            <!-- HIDE CARDS BUTTON -->
            <label for="u-cards-hide__button" class="c-button c-show__button">
                <span class="c-show__button--cards fa fa-eye"><img src="icons/eye.png" height="20px" width="20px"></span>
            </label>







        </div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic2ltMXBpc29uaSIsImEiOiJjazFscjg0NmwwODIyM2NwY3FnM2x3NnQ0In0.5T7HYABvQAgd355Ybcux7A';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/dark-v10',
                center: [11, 46],
                zoom: 7,
            });

            map.addControl(new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            }));
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
                            1, 1
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