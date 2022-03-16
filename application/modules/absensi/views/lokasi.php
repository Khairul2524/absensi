<!DOCTYPE html>
<html lang="en">

<head>

    <title>Quick Start - Leaflet</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 100%;
            width: 100%;
            max-width: 100%;
            max-height: 100%;
        }
    </style>


</head>

<body>

    <div id="map"></div>

    <script>
        var mymap = L.map("map", {
            center: [-8.6904474, 116.2495009],
        });

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            $('.map') = "Browser Anda Tidak Suport.";
        }

        function showPosition(position) {
            var marker = new L.marker([position.coords.latitude, position.coords.longitude]);
            var circles = [];
            circles[0] = L.circle([-8.6904474, 116.2495009], {
                radius: 25
            })
            // console.log(marker)
            circles.forEach(function(circle) {
                var d = mymap.distance(marker.getLatLng(), circle.getLatLng());
                var isInside = d < circle.getRadius();
                if (isInside) {
                    console.log('Anda Bisa Absen')
                    console.log(position.coords.longitude)
                    console.log(position.coords.latitude)
                } else {
                    console.log('Anda Tidak Bisa Absen')
                    console.log(position.coords.longitude)
                    console.log(position.coords.latitude)
                }
            });
        }
    </script>
</body>

</html>