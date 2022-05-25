<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerjalananExample;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login routes
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/', [LoginController::class, 'login'])->name('login.login');

//Register routes
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

//Home routes
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

// Perjalanan routes CRUD
Route::get('/perjalanan', [PerjalananController::class, 'index'])->middleware('auth')->name('perjalanan.index');
Route::post('/perjalanan', [PerjalananController::class, 'insert'])->name('perjalanan.insert');
Route::put('/perjalanan/{id}', [PerjalananController::class, 'update'])->name('perjalanan.update');
Route::delete('/perjalanan/{id}', [PerjalananController::class, 'delete'])->name('perjalanan.delete');

// Route::resource('perjalanan', PerjalananExample::class);

//Logout routes
Route::post('/logout', [LoginController::class, 'logout']);

//Filtering data 
Route::post('/perjalanan/results', [PerjalananController::class, 'filterData'])->name('perjalanan.filter');

//updte profile routes
Route::put('/perjalanan/profile/{id}', [PerjalananController::class, 'updateProfile'])->name('perjalanan.profile');
