<?php

use App\Http\Controllers\GeometryController;
use App\Http\Controllers\JsonGeometryController;
use App\Http\Controllers\JsonObjectsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\SelectObjectController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('object', ObjectController::class);
Route::get('/object', [ObjectController::class, 'index'])->name('object.index');

Route::resource('geometry', ObjectController::class);
Route::get('/geometry', [GeometryController::class, 'index'])->name('geometry.index');

Route::resource('geometry', GeometryController::class);

Route::get('/selectobject', [SelectObjectController  ::class, 'index'])->name('selectobject.index');
Route::get('jsonbject', [JsonObjectsController  ::class, 'index'])->name('jsonbject.index');
Route::get('jsongeometry', [JsonGeometryController  ::class, 'index'])->name('jsongeometry.index');
require __DIR__.'/auth.php';
