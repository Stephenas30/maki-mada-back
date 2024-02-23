<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationVoitureController;
use App\Http\Controllers\DispoVoitureController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Artisan;

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

// Locations
Route::post('/location/create', [LocationVoitureController::class, 'creationRental'])->name('location.create');

// Voitures coté admin
Route::post('/admin/voiture/create', [DispoVoitureController::class, 'creationVoiture'])->name('voiture.create');
Route::get('/admin/voiture', [DispoVoitureController::class, 'tout']);
Route::put('/admin/voiture/update/{voiture_id}', [DispoVoitureController::class, 'majVoiture']);
Route::delete('/admin/voiture/del/{voiture_id}', [DispoVoitureController::class, 'destroyVoiture']);
Route::post('/admin/voiture/images/add', [ImageController::class, 'upload']);
Route::delete('/admin/voitures/{voiture_id}/images/{img_id}', [ImageController::class, 'delete']);

// Voitures coté client
Route::get('/voitures', [DispoVoitureController::class, 'index']);
Route::get('/voitures/show', [DispoVoitureController::class, 'showVoiture']);

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'Migrations exécutées avec succès!';
});