<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AncianoController;
use App\Http\Controllers\ActividaController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});


Route::resource('users', UserController::class)->middleware('can:users.index');
Route::resource('anciano', AncianoController::class)->middleware('auth');
Route::resource('actividad', ActividaController::class)->middleware('auth');

Route::group(['middleware' => 'auth'],function () {
   Route::get('/', [InicioController::class, 'index'])->name('home');
   Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
});
