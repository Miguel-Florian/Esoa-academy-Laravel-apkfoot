<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RecetteController;
use App\Http\Controllers\API\DepenseController;
use App\Http\Controller\API\SessionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('infos', function (Request $request) {
    return 'api v1 for esoa academy';
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('recettes', RecetteController::class)->middleware('auth:api');
Route::apiResource('depenses', DepenseController::class)->middleware('auth:api');
Route::apiResource('sessions',SessionController::class)->middleware('auth:api');
Route::apiResource('payements',PayementController::class)->middleware('auth:api');
Route::apiResource('tuteurs',TuteurController::class)->middleware('auth:api');
Route::apiResource('instructeurs',InstructeurController::class)->middleware('auth:api');
Route::apiResource('categories',CategorieController::class)->middleware('auth:api');
Route::apiResource('type_recettes',Type_RecetteController::class)->middleware('auth:api');
Route::apiResource('type_depenses',Type_DepenseController::class)->middleware('auth:api');
