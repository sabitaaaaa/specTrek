<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
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
=======

// routes/web.php
Route::get('/recommend', [TrekRecommendationController::class, 'showForm'])->name('recommendation.form');
Route::post('/recommend', [TrekRecommendationController::class, 'processForm'])->name('recommendation.process');


Route::get('/form', function () {
    return view('form');
});
>>>>>>> 984c64976086bcf7202c3d6842f57cf725e74a5d
