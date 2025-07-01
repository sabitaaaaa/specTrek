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

Route::get('/see-more', function() {
    $hasPaid = \App\Models\PremiumPayment::where('status', 'success')->exists();
    return view('see_more', compact('hasPaid'));
});

Route::get('/esewa-pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa-success', [EsewaController::class, 'success']);
Route::get('/esewa-failure', [EsewaController::class, 'failure']);
