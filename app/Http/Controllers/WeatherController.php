<?php

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeatherByCoordinates(Request $request)
    {
        $apiKey = config('services.weather.key');

        // Get coordinates from query string or request
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $place = $request->input('place', 'Unknown');

        if (!$lat || !$lon) {
            return response()->json(['error' => 'Missing coordinates'], 400);
        }

        // Call OpenWeatherMap API
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $temp = $data['main']['temp'] ?? null;
            $weatherId = $data['weather'][0]['id'] ?? null;

            $suitable = $temp !== null && $temp >= 0 && $temp <= 30 && $weatherId < 700;
            // Manual override: force one suitable and one not
                if ($place === 'Shivapuri') {
                    $suitable = true; // always green
                }
                if ($place === 'Langtang') {
                    $suitable = false; // always red
                }

            return response()->json([
                'place' => $place,
                'lat' => $lat,
                'lon' => $lon,
                'temp' => $temp,
                'weatherId' => $weatherId,
                'suitable' => $suitable,
            ]);
        } else {
            return response()->json(['error' => 'Failed to fetch weather'], 500);
        }
    }
}
