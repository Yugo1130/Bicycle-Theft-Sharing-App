<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StolenBicycleController;
use App\Http\Controllers\AbandonedBicycleController;

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

Route::get('/', [StolenBicycleController::class, 'root']);
Route::get('/stolenbicycles', [StolenBicycleController::class, 'index']);
Route::get('/stolenbicycles/create', [StolenBicycleController::class, 'create']); //要ログイン
Route::get('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'show']);
Route::Post('/stolenbicycles', [StolenBicycleController::class, 'store']);
Route::get('/abandonedbicycles', [AbandonedBicycleController::class, 'index']);
Route::get('/abandonedbicycles/create', [AbandonedBicycleController::class, 'create']); //要ログイン
Route::get('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'show']);
Route::Post('/abandonedbicycles', [AbandonedBicycleController::class, 'store']);

