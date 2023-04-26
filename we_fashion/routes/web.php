<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('solde', [ProductController::class, 'solde'])->name('solde');
Route::get('/category/{slug}', [ProductController::class, 'category']);
Route::resource('product', ProductController::class)->except(['store', 'update','create', 'destroy']);


Auth::routes();

Route::middleware(['auth', 'mustBeAdmin'])->name('admin.')->group(function () {
    Route::resource('product', ProductController::class)->except(['index', 'show','create']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/products', [AdminController::class, 'products'])->name(('products'));
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name(('categories'));
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
