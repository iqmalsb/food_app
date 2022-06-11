<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Food Routes
Route::get('/foods', [App\Http\Controllers\FoodController::class, 'index'])->name('food.index');
Route::get('/foods/create', [App\Http\Controllers\FoodController::class, 'create'])->name('food.create');
Route::post('/foods/store', [App\Http\Controllers\FoodController::class, 'store'])->name('food.store');
