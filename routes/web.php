<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DjDashboardController;
use App\Http\Controllers\PublicInquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicInquiryController::class, 'create'])->name('inquiry.create');
Route::post('/zapytania', [PublicInquiryController::class, 'store'])->name('inquiry.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/logowanie', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/logowanie', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/rejestracja-dj', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/rejestracja-dj', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/wyloguj', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:dj'])->prefix('dj')->name('dj.')->group(function (): void {
    Route::get('/panel', [DjDashboardController::class, 'index'])->name('dashboard');
    Route::post('/promien', [DjDashboardController::class, 'updateRadius'])->name('radius.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/panel', [AdminDashboardController::class, 'index'])->name('dashboard');
});
