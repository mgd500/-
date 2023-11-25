<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\PostController;
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

Route::get('/index', function () {
    return view('index');
});
Route::get('/', [SpotController::class, 'index'])->name('index');
Route::get('/spots/create', [SpotController::class, 'create'])->middleware('auth');
Route::get('/spots/{spot}', [SpotController::class ,'show']);
Route::post('spot/review', [SpotController::class ,'review']);
Route::post('/spots', [SpotController::class, 'store']);
Route::post('/spots/create', [SpotController::class, 'store'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/index',[PostController::class,'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);
Route::delete('/spots/{spot}', [SpotController::class,'delete'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/{post}', [PostController::class ,'article']);

require __DIR__.'/auth.php';
