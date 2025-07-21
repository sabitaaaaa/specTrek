<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

// You can register your weather API here
Route::post('/weather-check', [App\Http\Controllers\API\WeatherMapController::class, 'check']);


Route::get('/api/weather-places', [WeatherController::class, 'fetchAllWeatherData'])->name('weather.places');
