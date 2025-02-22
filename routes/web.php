<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('dashboard', function () {
            return view('admin.home');
        })->name('dashboard');

        Route::get('dashboard/post', function () {
            return view('admin.post');
        })->name('dashboard.post');

        // To Post
        // To Create View
        Route::prefix('dashboard/post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('create', [PostController::class, 'create'])->name('post.create');
            Route::post('create', [PostController::class, 'store'])->name('post.store');
            Route::get('{id}/edit',  [PostController::class, 'edit'])->name('post.edit');
            Route::put('{id}/edit', [PostController::class, 'update'])->name('post.update');
            Route::delete('{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');
            Route::post('upload', [PostController::class, 'uploadImage'])->name('post.upload');
        });

        // To User
        Route::prefix('dashboard/user')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('user.index');
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('{id}/edit', [UserController::class, 'update'])->name('user.update');
            Route::delete('{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
        });
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/')->group(function () {
    Route::get('', [ViewController::class, 'index'])->name('page.index');
    Route::get('/about', function () {
        return view('page.about');
    })->name('page.about');
    Route::get('/show/{slug}', [ViewController::class, 'showPost'])->name('page.show');
});

Route::get('register', [AuthController::class, 'createRegistrasi'])->name('registrasi.tampil');
Route::post('register', [AuthController::class, 'storeRegistrasi'])->name('registrasi.store');

Route::get('login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('login', [AuthController::class, 'actionLogin'])->name('login.action');