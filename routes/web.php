<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('dashboard', function () {
        return view('admin.layout.app');
    })->name('dashboard')->middleware(AdminMiddleware::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('register', [AuthController::class, 'createRegistrasi'])->name('registrasi.tampil');
Route::post('register', [AuthController::class, 'storeRegistrasi'])->name('registrasi.store');

Route::get('login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('login', [AuthController::class, 'actionLogin'])->name('login.action');