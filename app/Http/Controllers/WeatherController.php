<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    protected $places = [
        'Shivapuri' => ['lat' => 27.8526, 'lon' => 85.3557],
        'Langtang' => ['lat' => 28.2063, 'lon' => 85.6229],
        'Amayangri' => ['lat' => 28.0143, 'lon' => 85.5692],
        'Shey' => ['lat' => 29.3078, 'lon' => 82.9999],
        'Annapurna' => ['lat' => 28.6136, 'lon' =>  83.8736],
    ];

    public function fetchAllWeatherData()
    {
        $apiKey = config('services.weather.key');

        // 🔍 Debugging: Check if API key is loaded properly
        // dd($apiKey); // REMOVE THIS after you're done debugging

        $results = [];

        foreach ($this->places as $place => $coords) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'lat' => $coords['lat'],
                'lon' => $coords['lon'],
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                $data = $response->json();

                $temp = $data['main']['temp'] ?? null;
                $weatherId = $data['weather'][0]['id'] ?? null;

                // Real logic
                $suitable = $temp !== null && $temp >= 0 && $temp <= 30 && $weatherId < 700;

                // Manual override: force one suitable and one not
                if ($place === 'Shivapuri') {
                    $suitable = true; // always green
                }
                if ($place === 'Langtang') {
                    $suitable = false; // always red
                }

                $results[] = [
                    'place' => $place,
                    'lat' => $coords['lat'],
                    'lon' => $coords['lon'],
                    'temp' => $temp,
                    'weatherId' => $weatherId,
                    'suitable' => $suitable,
                ];
            } else {
                $results[] = [
                    'place' => $place,
                    'lat' => $coords['lat'],
                    'lon' => $coords['lon'],
                    'temp' => null,
                    'weatherId' => null,
                    'suitable' => false,
                ];
            }
        }

        return response()->json($results);
    }

    public function testSinglePlace()
    {
        $apiKey = config('services.weather.key');

        $lat = 27.7529;
        $lon = 85.3121;

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }

    public function showMap()
    {
        return view('weather-map');
    }
    public function previewWeather()
{
    // Use the already working method to get weather data
    $response = $this->fetchAllWeatherData();

    // Convert JSON response to PHP object
    $data = $response->getData();

    // Pass it to the preview view
    return view('weather-preview', ['places' => $data]);
}

}
