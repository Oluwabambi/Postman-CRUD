<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getstudents', [ApiController::class, 'index']);
Route::get('/getstudents/{id}/show', [ApiController::class, 'show']);

Route::post('/student', [ApiController::class, 'create']);

Route::put('/getstudents/{id}/update', [ApiController::class, 'update']);
// Route::post('/getstudents/{id}/update', [ApiController::class, 'update']);
Route::delete('/getstudents/{id}/delete', [ApiController::class, 'destroy']);
