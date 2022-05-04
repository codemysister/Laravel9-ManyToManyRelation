<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/mahasiswa')->group(function () {
    Route::get('/all', [MahasiswaController::class, 'all']);
    Route::get('/attach', [MahasiswaController::class, 'attach']);
    Route::get('/attach-array', [MahasiswaController::class, 'attachArray']);
    Route::get('/attach-where', [MahasiswaController::class, 'attachWhere']);
    Route::get('/tampil', [MahasiswaController::class, 'tampil']);
    Route::get('/relationship-count', [MahasiswaController::class, 'relationshipCount']);
    Route::get('/detach', [MahasiswaController::class, 'detach']);
    Route::get('/sync', [MahasiswaController::class, 'sync']);
    Route::get('/sync-lagi', [MahasiswaController::class, 'syncLagi']);
    Route::get('/sync-chaining', [MahasiswaController::class, 'syncChaining']);
    Route::get('/sync-without', [MahasiswaController::class, 'syncWithout']);
    Route::get('/toggle', [MahasiswaController::class, 'toggle']);
    Route::get('/delete', [MahasiswaController::class, 'delete']);
});
