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

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('/stolenbicycles/create', [StolenBicycleController::class, 'create'])->name('sln.create');
    Route::post('/stolenbicycles', [StolenBicycleController::class, 'store'])->name('sln.store');
    Route::delete('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'delete'])->name('sln.delete');
    Route::put('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'update'])->name('sln.update');
    Route::get('/stolenbicycles/{slnbike}/edit', [StolenBicycleController::class, 'edit'])->name('sln.edit');
    Route::post('/stolenbicycles/{slnbike}/comments', [StolenCommentController::class, 'store'])->name('slncmtstore');
    Route::delete('/stolencomments/{comment}', [StolenCommentController::class, 'delete'])->name('slncmtdelete');
});

Route::get('/', [StolenBicycleController::class, 'root'])->name('root');
Route::get('/stolenbicycles', [StolenBicycleController::class, 'index'])->name('sln.index');
Route::get('/stolenbicycles/{slnbike}', [StolenBicycleController::class, 'show'])->name('sln.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/abandonedbicycles/create', [AbandonedBicycleController::class, 'create'])->name('abd.create');
    Route::post('/abandonedbicycles', [AbandonedBicycleController::class, 'store'])->name('abd.store');
    Route::delete('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'delete'])->name('abd.delete');
    Route::put('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'update'])->name('abd.update');
    Route::get('/abandonedbicycles/{abdbike}/edit', [AbandonedBicycleController::class, 'edit'])->name('abd.edit');
    Route::post('/abandonedbicycles/{abdbike}/comments', [AbandonedCommentController::class, 'store'])->name('abdcmt.store');
    Route::delete('/abandonedcomments/{comment}', [AbandonedCommentController::class, 'delete'])->name('abdcmt.delete');
});

Route::get('/abandonedbicycles', [AbandonedBicycleController::class, 'index'])->name('abd.index');
Route::get('/abandonedbicycles/{abdbike}', [AbandonedBicycleController::class, 'show'])->name('abd.show');
