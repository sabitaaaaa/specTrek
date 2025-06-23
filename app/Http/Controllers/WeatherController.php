<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //

    public function getWeather(Request $request)
    {
        $lat = $request->query('lat', '27.7172'); // Default Kathmandu
        $lon = $request->query('lon', '85.3240');

        $apiKey = config('services.weather.key'); // Get key from config

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to fetch data'], 500);
    }
}
