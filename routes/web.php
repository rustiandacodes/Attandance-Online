<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
 
Route::get('/home', [AbsensiController::class, 'index'])->middleware('auth');

Route::post('/home/in', [AbsensiController::class, 'in'])->middleware('auth');

Route::post('/home/out', [AbsensiController::class, 'out'])->middleware('auth');