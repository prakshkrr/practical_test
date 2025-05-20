<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/admin/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/register/customer', [RegisteredUserController::class, 'showCustomerForm'])->name('register.customer');
Route::post('/register/customer', [RegisteredUserController::class, 'registerCustomer']);

Route::get('/register/admin', [RegisteredUserController::class, 'showAdminForm'])->name('register.admin');
Route::post('/register/admin', [RegisteredUserController::class, 'registerAdmin']);

Route::get('/admin/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'adminLogin'])->name('admin.login.submit');

Route::get('/admin/dashboard', function () {
    $user = Auth::user();
    return view('admin.dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
})->name('logout');