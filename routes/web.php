<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserControllers;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\StripePaymentController;

// Stripe Payment Routes (protected by auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

    Route::get('/payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-cancel', [StripePaymentController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('/premium-content', function () {
        if (auth()->user()->is_premium) {
            return view('premium-content');
        }
        return redirect('/stripe')->with('error', 'Please pay to access premium content.');
    });
});

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout.post');

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Static Views
Route::view('/abc', 'abc')->name('abc');
Route::view('/shey', 'shey')->name('shey');
Route::view('/manaslu', 'manaslu')->name('manaslu');
Route::view('/example', 'example');
Route::view('/form', 'form');
Route::view('/Tours', 'Tours')->name('tours');
Route::view('/AmaYangriTrek', 'AmaYangriTrek')->name('AmaYangriTrek');
Route::view('/LangtangTrek', 'LangtangTrek')->name('LangtangTrek');
Route::view('/ShivapuriTrek', 'ShivapuriTrek')->name('ShivapuriTrek');
// Route::view('/shivapuri-trek', 'ShivapuriTrek')->name('ShivapuriTrek');
Route::view('/annapurna-base-camp', 'abc');
Route::view('/shey-phoksundo', 'shey');
Route::view('/langtang-trek', 'LangtangTrek');
Route::view('/ama-yangri-trek', 'AmaYangriTrek');
Route::view('/manaslu-trek', 'manaslu');

// About with parameter
Route::get('/about/{name}', function ($name) {
    return view('about', ["name" => $name]);
});

// Weather
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/weather-preview', [WeatherController::class, 'previewWeather']);
Route::get('/api/weather-places', [WeatherController::class, 'fetchAllWeatherData'])->name('weather.places');
Route::get('/weathermap', fn () => view('weathermap'));
Route::get('/weather/test-all', [WeatherController::class, 'fetchAllWeatherData']);

// Trek Recommendation
// Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommend.form');
// Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommend.process');
// Route::get('/recommendation', [TrekController::class, 'showForm'])->name('recommendation');
Route::get('/api/treks-by-price', [TrekController::class, 'filterByPrice']);
// Route::get('/recommendation', [TrekController::class, 'showForm'])->name('recommendation.form');
// Review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Posts (CRUD)
Route::resource('posts', PostController::class);

// Premium content
Route::get('/see-more', function () {
    $hasPaid = \App\Models\PremiumPayment::where('status', 'success')->exists();
    return view('see_more', compact('hasPaid'));
});

// Payment Routes
Route::get('/esewa-pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa-success', [EsewaController::class, 'success']);
Route::get('/esewa-failure', [EsewaController::class, 'failure']);

Route::get('/Khalti', [KhaltiController::class, 'pay']);
Route::get('/shivapuri/payment', function () {
    return Auth::check() ? view('payment-options') : redirect('/login?redirect=/shivapuri/payment');
})->middleware('auth')->name('shivapuri.payment');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

    // Admin Dashboard (by email)
    Route::get('/admin-dashboard', function () {
        if (Auth::user()->email !== 'sabita23@gmail.com') {
            abort(403, 'Unauthorized');
        }
        $userCount = User::count();
        return view('admin-dashboard', compact('userCount'));
    })->name('admin.dashboard');

    // Trek/tours
    Route::get('/tours', [TrekController::class, 'showTours']);

    // Admin Panel
    Route::prefix('admin')->group(function () {
        // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/users', UserController::class)->names('admin.users');
    });
});

// Users Management
Route::resource('users', UsersController::class);
// Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

// ITINERARY RESOURCE ROUTE WITH SLUG BINDING
// Make sure your Itinerary model has:
// public function getRouteKeyName() { return 'slug'; }
Route::resource('itinerary', ItineraryController::class);

// Removed duplicate manual itinerary routes with same URI and name
Route::get('/treks/{id}', [TrekController::class, 'show'])->name('treks.show');

//preferencecontroller
use App\Http\Controllers\PreferenceController;

Route::post('/preferences', [PreferenceController::class, 'store'])->middleware('auth');
// for storing user prefernces like what user fill in the form
use App\Http\Controllers\UserPreferenceController;

// Show the preference form
Route::get('/preferences', [UserPreferenceController::class, 'showForm'])->name('preferences.form')->middleware('auth');

// Store/update the preferences
Route::post('/preferences', [UserPreferenceController::class, 'store'])->name('preferences.store')->middleware('auth');
//authenticted recommendation
Route::middleware(['auth', 'premium'])->group(function () {
    Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommendation.form');
    Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommend.process');
});

