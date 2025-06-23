<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/about', function () {
     return view('about');
 });
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


Route::get('/form', function () {
    return view('form');
});



use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


use App\Http\Controllers\TrekController;

Route::get('/tours', [TrekController::class, 'showTours']);
