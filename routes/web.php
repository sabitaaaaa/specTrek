<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Controllers
use App\Http\Controllers\{
    HomeController,
    AuthController,
    LoginController,
    AdminController,
    AdminUserController,
    UserController,
    DashboardController,
    TrekController,
    WeatherController,
    RecommendationController,
    PostController,
    KhaltiController,
    EsewaController,
    StripePaymentController,
    PaymentController,
    ReviewController,
    ItineraryController,
    Admin\UsersController as AdminUsersController,
};

// Public Routes
Route::view('/', 'welcome')->name('home');
Route::view('/abc', 'abc');
Route::view('/shey', 'shey');
Route::view('/manaslu', 'manaslu');
Route::view('/example', 'example');
Route::view('/form', 'form');
Route::view('/Tours', 'Tours')->name('tours');
Route::view('/AmaYangriTrek', 'AmaYangriTrek')->name('AmaYangriTrek');
Route::view('/LangtangTrek', 'LangtangTrek')->name('LangtangTrek');
Route::view('/ShivapuriTrek', 'ShivapuriTrek')->name('ShivapuriTrek');
Route::view('/annapurna-base-camp', 'abc');
Route::view('/shey-phoksundo', 'shey');
Route::view('/langtang-trek', 'LangtangTrek');
Route::view('/ama-yangri-trek', 'AmaYangriTrek');
Route::view('/manaslu-trek', 'manaslu');
Route::view('/payment-options', 'payment-options');

Route::get('/about/{name}', fn($name) => view('about', ["name" => $name]));

// Auth
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', fn() => tap(Auth::logout(), fn() => redirect('/')))->name('logout');

// Itinerary
Route::get('/itinerary/{slug}', function ($slug) {
    $itinerary = \App\Models\Itinerary::where('slug', $slug)->firstOrFail();
    return view('itinerary.show', compact('itinerary'));
})->where('slug', '^(?!create$|edit$|delete$)[a-zA-Z0-9\-]+$');
Route::resource('itinerary', ItineraryController::class);

// Payment
Route::get('/{slug}/payment', fn($slug) => view('payment', ['slug' => $slug]));
Route::get('/see-more', fn() => view('see_more', ['hasPaid' => \App\Models\PremiumPayment::where('status', 'success')->exists()]));
Route::post('/charge', [PaymentController::class, 'charge']);

// Stripe
Route::middleware('auth')->group(function () {
    Route::get('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
    Route::get('/payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-cancel', [StripePaymentController::class, 'paymentCancel'])->name('payment.cancel');
    Route::get('/premium-content', fn() => auth()->user()->is_premium ? view('premium-content') : redirect('/stripe')->with('error', 'Please pay to access premium content.'));
});

// Esewa
Route::get('/esewa-pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa-success', [EsewaController::class, 'success']);
Route::get('/esewa-failure', [EsewaController::class, 'failure']);

// Khalti
Route::get('/Khalti', [KhaltiController::class, 'pay']);

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

    // Admin dashboard by email check
    Route::get('/admin-dashboard', function () {
        abort_if(Auth::user()->email !== 'sabita23@gmail.com', 403);
        $userCount = User::count();
        return view('admin-dashboard', compact('userCount'));
    })->name('admin.dashboard');

    // Trek Tours
    Route::get('/tours', [TrekController::class, 'showTours']);

    // Admin User CRUD
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/users', UserController::class)->names('admin.users');
    });
});

// User Management (for admin panel)
Route::resource('users', AdminUsersController::class);

// Review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Posts (CRUD)
Route::resource('posts', PostController::class);

// Weather
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/weather-preview', [WeatherController::class, 'previewWeather']);
Route::get('/weathermap', fn () => view('weathermap'));
Route::get('/api/weather-places', [WeatherController::class, 'fetchAllWeatherData'])->name('weather.places');

// Recommendation
Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommend.form');
Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommend.process');

// Filter Treks by Price
Route::get('/api/treks-by-price', [TrekController::class, 'filterByPrice']);

// Protected view example
Route::get('/shivapuri/payment', fn() => Auth::check() ? view('payment-options') : redirect('/login?redirect=/shivapuri/payment'))->middleware('auth')->name('shivapuri.payment');
