<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', function () {
    return view('products');
});

use App\Http\Controllers\AuthController;

    // Login Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Admin Routes
Route::prefix('/admin')->name('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminHomeController::class, 'index']);
    Route::get('/product', [App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('admin.product.index');
});
    // Account Routes
use App\Http\Controllers\AccountController;
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');
});