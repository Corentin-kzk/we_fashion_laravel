<?php

use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class, 'index']);
Route::get('solde', [ProductController::class, 'solde'])->name('solde');
Route::get('/category/{slug}', [ProductController::class, 'category']);


Route::resource('product', ProductController::class);
Auth::routes();

Route::get('/admin',[function() { return view('layouts.dashboard');}]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
