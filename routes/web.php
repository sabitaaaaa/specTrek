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




use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Admin\UserControllers;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;



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

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\StripePaymentController;


// Stripe Payment Routes (protected by auth)
Route::middleware(['auth'])->group(function () {

    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

//changed

Route::get('/{slug}/payment', function ($slug) {
    // optionally you can validate if $slug exists in DB
    return view('payment', ['slug' => $slug]);
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/signup', function () {
    return view('register');
})->name('register');
    Route::get('/payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-cancel', [StripePaymentController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('/premium-content', function () {
        if (auth()->user()->is_premium) {
            return view('premium-content');
        }
        return redirect('/stripe')->with('error', 'Please pay to access premium content.');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

    Route::get('/payment-success', [StripePaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment-cancel', [StripePaymentController::class, 'paymentCancel'])->name('payment.cancel');

    // Auth


//
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');






Route::resource('/admin/users', UserController::class);
Route::resource('users', UsersController::class);

Route::resource('/admin/users', UserController::class);

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

    Route::get('/premium-content', function () {
        if (auth()->user()->is_premium) {
            return view('premium-content');
        }
        return redirect('/stripe')->with('error', 'Please pay to access premium content.');
    });
});
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.post');


Route::get('/', [HomeController::class, 'index'])->name('home');


// dynamic view for user
Route::get('/itinerary/{slug}', function ($slug) {
    $itinerary = \App\Models\Itinerary::where('slug', $slug)->firstOrFail();
    return view('itinerary.show', compact('itinerary'));
})->where('slug', '^(?!create$|edit$|delete$)[a-zA-Z0-9\-]+$');

Route::resource('itinerary', ItineraryController::class);

// change
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


// Home
Route::get('/', [HomeController::class, 'index'])->name('home');


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

// Route::resource('admin/users', UserControllers::class);
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

    // Admin Dashboard - by checking email (sabita23@gmail.com)
    Route::get('/admin-dashboard', function () {
        if (Auth::user()->email !== 'sabita23@gmail.com') {
            abort(403, 'Unauthorized');
        }

        $userCount = User::count();
        return view('admin-dashboard', compact('userCount'));
    })->name('admin.dashboard');

    // Trek view
    Route::get('/tours', [TrekController::class, 'showTours']);

    // Admin Panel Routes
    Route::prefix('admin')->group(function () {
        // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/users', UserController::class)->names('admin.users');
    });
});

// Users Management
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
  


//
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');




// Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
//     Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
//     Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
//     Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
//     Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
// });



Route::resource('/admin/users', UserController::class);
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



Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// for review =================

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/', [HomeController::class, 'index']);



// dynamic view for user
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

use App\Http\Controllers\ProfileController;

// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::post('/profile/upload-logo', [ProfileController::class, 'uploadLogo'])->name('profile.uploadLogo');
// Route::post('/profile/upload-logo', [ProfileController::class, 'uploadLogo'])->name('profile.uploadLogo');
// use App\Http\Controllers\ProfileController;

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/upload-logo', [ProfileController::class, 'uploadLogo'])->name('profile.uploadLogo');




//new chnages


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/upload-logo', [HomeController::class, 'updateLogo'])->name('site.uploadLogo');

// Store/update the preferences
Route::post('/preferences', [UserPreferenceController::class, 'store'])->name('preferences.store')->middleware('auth');
//authenticted recommendation
Route::middleware(['auth', 'premium'])->group(function () {
    Route::get('/recommend', [TrekController::class, 'showForm'])->name('recommendation.form');
    Route::post('/recommend', [TrekController::class, 'processForm'])->name('recommend.process');
});
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
