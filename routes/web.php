

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\Admin\UserControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;  
use App\Http\Controllers\AdminUserController; 


Route::get('/users', [UserControllers::class, 'index'])->name('users.index');


Route::get('/', function () {
    return view('home'); // Make sure home.blade.php exists
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

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

Route::middleware(['auth'])->group(function () {
    
    // User Dashboard
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
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});


Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');




// Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
//     Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
//     Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
//     Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
//     Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
// }); 



Route::resource('/admin/users', UserController::class);
Route::resource('users', UsersController::class);

Route::resource('/admin/users', UserController::class);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



use App\Http\Controllers\Admin\UsersController;
Route::resource('users', UsersController::class);

// Route::resource('admin/users', UserControllers::class);
