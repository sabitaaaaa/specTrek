// ====== Weather ======
const weatherApiKey = '0febbe77e78e4200825151638250706'; // Replace with real API key
const city = 'Kathmandu';

async function getWeather() {
  try {
    const res = await fetch(
      `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${weatherApiKey}&units=metric`
    );
    const data = await res.json();
    const output = `🌡 ${data.main.temp}°C | ${data.weather[0].description}`;
    document.getElementById('weatherInfo').innerText = output;
  } catch (err) {
    document.getElementById('weatherInfo').innerText = 'Weather data unavailable.';
  }
}
getWeather();
document.addEventListener("DOMContentLoaded", getWeather);

// ====== Map ======
const map = L.map('mapContainer').setView([27.7, 85.3], 7); // Kathmandu

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap'
}).addTo(map);

const treks = [
  { name: 'Langtang', lat: 28.211, lon: 85.556 },
  { name: 'ABC', lat: 28.532, lon: 83.884 },
  { name: 'Shivapuri', lat: 27.792, lon: 85.410 }
];

treks.forEach(trek => {
  L.marker([trek.lat, trek.lon])
    .addTo(map)
    .bindPopup(`<b>${trek.name}</b>`);
});

// ====== Login Modal ======
function toggleLogin() {
  const modal = document.getElementById("loginModal");
  modal.classList.toggle("hidden");
}

function login() {
  const username = document.getElementById("username").value;
  const password = btoa(document.getElementById("password").value);
  const msg = document.getElementById("loginMsg");

  if (username && password) {
    msg.innerText = `Welcome, ${username}!`;
  } else {
    msg.innerText = "Please fill in both fields.";
  }
}
