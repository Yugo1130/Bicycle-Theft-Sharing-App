<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function(){
    Route::get('/stolenbicycles/create', [StolenBicycleController::class, 'create']);
    Route::Post('/stolenbicycles', [StolenBicycleController::class, 'store']);
    Route::Delete('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'delete']);
    Route::put('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'update']);
    Route::get('/stolenbicycles/{slnbike}/edit', [StolenBicycleController::class, 'edit']);
    Route::post('/stolenbicycles/{slnbike}/comments', [StolenCommentController::class, 'store']);
    Route::Delete('/stolencomments/{comment}', [StolenCommentController::class, 'delete']);
});

Route::get('/', [StolenBicycleController::class, 'root']);
Route::get('/stolenbicycles', [StolenBicycleController::class, 'index']);
Route::get('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'show']);

Route::group(['middleware' => ['auth']], function(){
    Route::get('/abandonedbicycles/create', [AbandonedBicycleController::class, 'create']);
    Route::Post('/abandonedbicycles', [AbandonedBicycleController::class, 'store']);
    Route::Delete('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'delete']);
    Route::put('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'update']);
    Route::get('/abandonedbicycles/{abdbike}/edit', [AbandonedBicycleController::class, 'edit']);
    Route::post('/abandonedbicycles/{abdbike}/comments', [AbandonedCommentController::class, 'store']);
    Route::Delete('/abandonedcomments/{comment}', [AbandonedCommentController::class, 'delete']);
});

Route::get('/abandonedbicycles', [AbandonedBicycleController::class, 'index']);
Route::get('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'show']);
