<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\TrekController;




Route::get('/', function () {
    return view('welcome');
});
// making another route and change in the place of welcome replace it with required file name
// Route::get('/view', function () {
//     return view('home');
// });


//Short cut of putting a route
// Route::view('/home','home');
// Route::view("/about","about");


// Route::get('/about', function () {
//      return view('about');
//  });
// /about chai huna parcha haina url ma /about lekhda about ko page aaos bhanera

// suppose euta certain naam ko manche ko appear huna paryore data the we should:
Route::get('/about/{name}', function ($name) {
    echo "$name";//first way to show name
     return view('about',["name"=>$name]);//second way to show name
 });
 Route::get('/weather', [WeatherController::class, 'getWeather']);
 Route ::get('/Tours',function(){
    return view('Tours');
 });

Route::get('/home', function () {
    return view('home');
});
// routes/web.php
Route::get('/recommend', [TrekRecommendationController::class, 'showForm'])->name('recommendation.form');
Route::post('/recommend', [TrekRecommendationController::class, 'processForm'])->name('recommendation.process');

// ====API
Route::get('/api/weather-places', [WeatherController::class, 'fetchAllWeatherData'])->name('weather.places');
Route::get('/weathermap', function () {
    return view('weathermap');
});
Route::get('/weather/test-all', [WeatherController::class, 'fetchAllWeatherData']);


//TOURS PAGE ROUTE
Route ::get('/Tours',function(){
    return view('Tours');
 })->name('tours');
// use App\Http\Controllers\TrekController;
Route::get('/recommendation', [TrekController::class, 'showForm'])->name('recommendation');


Route::get('/form', function () {
    return view('form');
});

Route::get('/AmaYangriTrek', function () {
    return view('AmaYangriTrek');
});


Route::get('/LangtangTrek', function () {
    return view('LangtangTrek');
});

Route::get('/ShivapuriTrek', function () {
    return view('ShivapuriTrek');
});

Route::get('/AmaYangriPaid', function () {
    return view('AmaYangriPaid');
});

Route::get('/Langtangpaid', function () {
    return view('Langtangpaid');
});

Route::get('/Shivapuripaid', function () {
    return view('Shivapuripaid');
});



use App\Http\Controllers\PaymentController;

Route::post('/charge', [PaymentController::class, 'charge']);
Route::get('/esewa-pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa-success', [EsewaController::class, 'success']);
Route::get('/esewa-failure', [EsewaController::class, 'failure']);



Route::get('/weather-preview', [WeatherController::class, 'previewWeather']);

// Route::get('/recommend', [RecommendationController::class, 'showForm'])->name('recommend.form');
// Route::post('/recommend', [RecommendationController::class, 'processForm'])->name('recommend.process');



// Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommendation.form');
// Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommendation.result');


//RECOMENDATION
Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommendation.form');
Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommendation.result');
Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommend.process');





Route::get('/example', function () {
    return view('example');
});

Route::get('/abc', function () {
    return view('abc');
});

Route::get('/shey', function () {
    return view('shey');
});

Route::get('/manaslu', function () {
    return view('manaslu');
});


use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
