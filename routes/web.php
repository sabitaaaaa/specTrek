<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsewaController;

Route::get('/', function () {
    return view('welcome');
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
