<?php
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Middleware\GuestAdminMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RcInformationController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;



Route::get('/signup', [CountryController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'addUser'])->name('addUser');

Route::get('/rc-information/create', [RcInformationController::class, 'create'])->name('rc_information.create');

Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth')->name('dashboard');

Route::middleware([GuestAdminMiddleware::class])->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'index']);
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
});


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.auth.dashboard');
});





Route::get('/profile-form', [RcInformationController::class, 'create'])->name('profile.form');
Route::post('/profile-submit', [RcInformationController::class, 'store'])->name('profile.submit');
Route::get('/profile-success', function () {
    return view('success'); 
})->name('profile.success');
