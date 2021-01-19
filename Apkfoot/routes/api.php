<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Models\Recette;
use App\Http\Resources\RecetteResource;
use App\Http\Controllers\RecetteController;
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

// Requette concernant les users
    Route::middleware('auth:api')->get('/users', function (Request $request) {
        return $request->user();
    });//cette route retourne dasboard hors devait retourner tous les users à condition que le client soit connecté

Route::get('/user','App\Http\Controllers\UserController@user');
Route::get('/user/{id}','App\Http\Controllers\UserController@userById');


// Requette concernant les recettes
Route::get('/recette', [RecetteController::class, 'recette']);
Route::post('/recette', [RecetteController::class, 'add']);
Route::put('/recette', [RecetteController::class, 'update']);
Route::get('/recetteByDate/{date}',[RecetteController::class, 'recetteByDate'] );

