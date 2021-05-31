<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;
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

Route::post('/policies', [PolicyController::class, 'store']);
Route::get('/policies', [PolicyController::class, 'index']);
Route::get('/policies/{id}', [PolicyController::class, 'show']);
Route::put('/policies/{id}', [PolicyController::class, 'update']);
Route::delete('/policies/{id}', [PolicyController::class, 'destroy']);
Route::get('/policies/bylead/{leadId}', [PolicyController::class, 'policiesByLead']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
