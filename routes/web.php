<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/recommend', [TrekRecommendationController::class, 'showForm'])->name('recommendation.form');
Route::post('/recommend', [TrekRecommendationController::class, 'processForm'])->name('recommendation.process');


Route::get('/form', function () {
    return view('form');
});
