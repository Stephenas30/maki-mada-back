<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationVoitureController;
use App\Http\Controllers\DispoVoitureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/location/create', [LocationVoitureController::class, 'creationRental'])->name('location.create');
Route::post('/voiture/create', [DispoVoitureController::class, 'creationVoiture'])->name('voiture.create');
Route::get('/voitures', [DispoVoitureController::class, 'index']);
Route::get('/voitures/show', [DispoVoitureController::class, 'showVoiture']);
