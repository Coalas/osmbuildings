<!DOCTYPE html>
<html>
<head>
    <title>OSM Buildings - Sandbox</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <style type="text/css">
    html, body {
        border: 0;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    #map {
        height: 100%;
    }
    </style>
    <link rel="stylesheet" href="leaflet-0.5.1/leaflet.css">
    <script src="leaflet-0.5.1/leaflet.js"></script>
	<script><?php
	$srcPath = "../src";
	$srcFiles = array(
		$srcPath . "/prefix.js",
		$srcPath . "/shortcuts.js",
		$srcPath . "/lib/Color.js",
		$srcPath . "/lib/SunPosition.js",
		$srcPath . "/constants.js",
		$srcPath . "/geometry.js",
			$srcPath . "/prefix.class.js",
			$srcPath . "/variables.js",
			$srcPath . "/functions.js",
			$srcPath . "/Layers.js",
			$srcPath . "/data.js",
			$srcPath . "/properties.js",
			$srcPath . "/events.js",
			$srcPath . "/render.js",
			$srcPath . "/Shadows.js",
			$srcPath . "/FlatBuildings.js",
			$srcPath . "/public.js",
			$srcPath . "/suffix.class.js",
		$srcPath . "/suffix.js",
		$srcPath . "/engines/Leaflet.js"
	);
	for ($i = 0; $i < count($srcFiles) ; $i++) {
		echo "\n//*** ".$srcFiles[$i]." ***\n\n";
		echo file_get_contents($srcFiles[$i]);
		echo "\n";
	}
	?></script>
</head>

<body>
    <div id="map"></div>

    <style>
    .datetime {
        position: relative;
        bottom: 140px;
        width: 300px;
        margin: auto;
        background-color: rgba(255,255,255,0.4);
        font-size: 10pt;
        font-family: Helvetica, Arial, sans-serif;
        padding: 10px;
    }
    .datetime label {
        display: block;
        width: 100%;
        height: 20px;
    }
    .datetime input {
        width: 100%;
        height: 30px;
        margin-bottom: 10px;
        background-color: transparent;
    }
    </style>

    <div class="datetime">
        <label for="time">Time: </label>
        <input id="time" type="range" min="0" max="95">

        <label for="date">Date: </label>
        <input id="date" type="range" min="0" max="23">
    </div>

    <script>
    var map = new L.Map('map').setView([52.50557, 13.33451], 17); // Berlin Ku'Damm
//  var map = new L.Map('map').setView([52.52079, 13.40882], 17); // Berlin Fernsehturm
//  var map = new L.Map('map').setView([55.82116, 37.61263], 17); // Moscow
    new L.TileLayer('http://otile1.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpg', { maxZoom: 18 }).addTo(map);
//  new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png', { maxZoom: 18 }).addTo(map);

    var osmb = new L.BuildingsLayer({ url: '../server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
    L.control.layers({}, { Buildings: osmb }).addTo(map);
    </script>
</body>
</html>