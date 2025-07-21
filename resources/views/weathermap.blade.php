<!DOCTYPE html>
<html>
<head>
    <title>Weather Suitability Map - Trekking Places</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map { height: 600px; }
        .marker-green { background-color: green; width: 15px; height: 15px; border-radius: 50%; }
        .marker-red { background-color: red; width: 15px; height: 15px; border-radius: 50%; }
    </style>
</head>
<body>

<h1>Weather Suitability for Trekking Places</h1>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const map = L.map('map').setView([27.8, 84.5], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 13,
    }).addTo(map);

    // Fetch weather data from Laravel API
    axios.get('{{ route("weather.places") }}')
        .then(response => {
            const places = response.data;

            places.forEach(place => {
                const markerColor = place.suitable ? 'green' : 'red';

                const marker = L.circleMarker([place.lat, place.lon], {
                    radius: 10,
                    fillColor: markerColor,
                    color: markerColor,
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.7
                }).addTo(map);

                marker.bindPopup(`
                    <b>${place.place}</b><br/>
                    Temp: ${place.temp ?? 'N/A'} °C<br/>
                    
                    Suitable: ${place.suitable ? 'Yes' : 'No'}
                `);
            });
        })
        .catch(error => {
            alert('Error fetching weather data.');
            console.error(error);
        });
</script>

</body>
</html>
