<!DOCTYPE html>
<html>
<head>
    <title>Weather Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 90vh;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; margin: 10px;">Trek Suitability Weather Map</h2>
    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Initialize the map centered on Nepal
        const map = L.map('map').setView([28.2, 84.0], 7);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

        // Define icons
        const greenIcon = L.icon({
            iconUrl: '/images/green-marker.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
        });

        const redIcon = L.icon({
            iconUrl: '/images/red-marker.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
        });

        // Fetch weather data
        async function loadWeatherData() {
            const response = await fetch('/api/weather'); // adjust the URL if different
            const data = await response.json();

            data.forEach(place => {
                console.log(place.place, 'Suitable:', place.suitable);

                L.marker([place.lat, place.lon], {
                    icon: place.suitable ? greenIcon : redIcon
                })
                .addTo(map)
                .bindPopup(`
                    <strong>${place.place}</strong><br>
                    Temp: ${place.temp ?? 'N/A'}°C<br>

                    <span style="color: ${place.suitable ? 'green' : 'red'};">
                        ${place.suitable ? 'Suitable for Trek' : 'Not Suitable'}
                    </span>
                `);
            });
        }

        loadWeatherData();
    </script>
</body>
</html>
