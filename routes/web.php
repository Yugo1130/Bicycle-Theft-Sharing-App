<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StolenBicycleController;
use App\Http\Controllers\AbandonedBicycleController;
use App\Http\Controllers\StolenCommentController;
use App\Http\Controllers\AbandonedCommentController;


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
Route::Delete('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'delete']);
Route::put('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'update']);
Route::get('/stolenbicycles/{slnbike}/edit', [StolenBicycleController::class, 'edit']);
Route::post('/stolenbicycles/{slnbike}/comments', [StolenCommentController::class, 'store']);
Route::Delete('/stolencomments/{comment}', [StolenCommentController::class, 'delete']);

Route::get('/abandonedbicycles', [AbandonedBicycleController::class, 'index']);
Route::get('/abandonedbicycles/create', [AbandonedBicycleController::class, 'create']); //要ログイン
Route::get('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'show']);
Route::Post('/abandonedbicycles', [AbandonedBicycleController::class, 'store']);
Route::Delete('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'delete']);
Route::put('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'update']);
Route::get('/abandonedbicycles/{abdbike}/edit', [AbandonedBicycleController::class, 'edit']);
Route::post('/abandonedbicycles/{abdbike}/comments', [AbandonedCommentController::class, 'store']);
Route::Delete('/abandonedcomments/{comment}', [AbandonedCommentController::class, 'delete']);



