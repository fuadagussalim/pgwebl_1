<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PolylineController;
use App\Http\Controllers\PolygoneController;
use App\Http\Controllers\ProfileController;
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


Route::get('/map', [MapController::class, 'map']) -> name('map');
Route::get('/', [MapController::class, 'map']) -> name('map');
Route::get('/table', [MapController::class, 'table']) -> name('table');

//Create point
Route::post('/store-point', [PointController::class, 'store']) -> name('store-point');
Route::post('/store-polyline', [PolylineController::class, 'store']) -> name('store-polyline');
Route::post('/store-polygone', [PolygoneController::class, 'store']) -> name('store-polygone');
Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
