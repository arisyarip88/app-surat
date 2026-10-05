<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\SettingNomorController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('surat', SuratController::class);
    Route::prefix('kode/{jenis}')->whereIn('jenis', [1, 2, 3])->name('kode.')->controller(KodeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });

    Route::get('setting/nomor', [SettingNomorController::class, 'index'])->name('setting.index');
    Route::post('setting/nomor', [SettingNomorController::class, 'store'])->name('setting.store');
    Route::delete('setting/{setting}', [SettingNomorController::class, 'destroy'])->name('setting.destroy');

    Route::middleware(EnsureAdmin::class)->group(function () {
        Route::resource('user', UserController::class)->except('show');
    });
});


