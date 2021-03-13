<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConcessionaireController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('.login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth:logout')->name('.logout');
});

Route::middleware(['jwt.auth'])->group(function () {
    Route::prefix('/client')->name('client')->group(function () {
        Route::get('/', [ClientController::class, 'getAllClients'])->name('.getAll');
        Route::get('/{id}', [ClientController::class, 'getClient'])->name('.get');
        Route::post('/', [ClientController::class, 'createClient'])->name('.save');
        Route::put('/', [ClientController::class, 'updateClient'])->name('.update');
        Route::delete('/', [ClientController::class, 'deleteClient'])->name('.delete');
    });

    Route::prefix('/region')->name('region')->group(function () {
        Route::get('/', [RegionController::class, 'getAllRegions'])->name('.getAll');
        Route::get('/{id}', [RegionController::class, 'getRegion'])->name('.get');
        Route::post('/', [RegionController::class, 'createRegion'])->name('.save');
        Route::put('/', [RegionController::class, 'updateRegion'])->name('.update');
        Route::delete('/', [RegionController::class, 'deleteRegion'])->name('.delete');
    });

    Route::prefix('/concessionaire')->name('concessionaire')->group(function () {
        Route::get('/', [ConcessionaireController::class, 'getAllConcessionaires'])->name('.getAll');
        Route::get('/{id}', [ConcessionaireController::class, 'getConcessionaire'])->name('.get');
        Route::post('/', [ConcessionaireController::class, 'createConcessionaire'])->name('.save');
        Route::put('/', [ConcessionaireController::class, 'updateConcessionaire'])->name('.update');
        Route::delete('/', [ConcessionaireController::class, 'deleteConcessionaire'])->name('.delete');
    });

    Route::prefix('/report')->name('report')->group(function () {
        Route::get('/client', [ClientController::class, 'generateReport'])->name('.client');
    });
});
