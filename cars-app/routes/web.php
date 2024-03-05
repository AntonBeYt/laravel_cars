<?php

use App\Http\Controllers\CarDeleteController;
use App\Http\Controllers\CarUpdateFineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::get('/', function () {
    return view('index');
});
Route::view('/', 'index')->name('login')->middleware('guest');
Route::post('/login', LoginController::class)->middleware('guest');
Route::post('/logout', LogoutController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::post('car/{car}/delete', CarDeleteController::class);
Route::patch('car/{car}/updateFine', CarUpdateFineController::class);
