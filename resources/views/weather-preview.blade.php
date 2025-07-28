<!DOCTYPE html>
<html>
<head>
    <title>Weather API Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 300px;
        }

        .map {
            height: 200px;
            border-radius: 8px;
            margin-top: 10px;
        }

        h3 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

@foreach ($places as $index => $place)
    <div class="card">
        <h3>{{ $place->place }}</h3>
        <p>🌡 Temp: {{ $place->temp }}°C</p>
        <p>Status:
            @if ($place->suitable)
                <span style="color:green">Suitable </span>
            @else
                <span style="color:red">Not Suitable </span>
            @endif
        </p>
        <div id="map{{ $index }}" class="map"></div>
    </div>
@endforeach

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const places = @json($places);

    places.forEach((place, index) => {
        const map = L.map('map' + index).setView([place.lat, place.lon], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        L.circleMarker([place.lat, place.lon], {
            radius: 10,
            fillColor: place.suitable ? 'green' : 'red',
            color: place.suitable ? 'green' : 'red',
            weight: 1,
            fillOpacity: 0.8
        }).addTo(map);
    });
</script>

</body>
</html>
