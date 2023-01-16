<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [GameController::class, 'promotion'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/games/create', [GameController::class, 'create'])->name('games.create')->middleware(['auth', 'verified']);
Route::post('/games/store', [GameController::class, 'store'])->name('games.store')->middleware(['auth', 'verified']);
Route::get('/games', [GameController::class, 'index'])->name('games.index')->middleware(['auth', 'verified']);
Route::get('/games/{game}/show', [GameController::class, 'show'])->name('games.show')->middleware(['auth', 'verified']);
Route::post('/games/{game}/purchase', [GameController::class, 'purchase'])->name('games.purchase')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
