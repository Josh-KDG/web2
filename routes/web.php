<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\IntendantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\SurveillantController;

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
Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('Eleve', EleveController::class)->except(['show']);
    Route::resource('Parent', ParentController::class)->except(['show']);
    Route::resource('Enseignant', EnseignantController::class)->except(['show']);
   Route::resource('Directeur', DirecteurController::class)->except(['show']);
   Route::resource('Secretaire', SecretaireController::class)->except(['show']);
    Route::resource('Intendant', IntendantController::class)->except(['show']);
    Route::resource('Surveillant',SurveillantController::class)->except(['show']);
});
// web.php
Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages/send', [MessageController::class, 'sendMessage']);
