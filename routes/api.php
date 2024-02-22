<?php

use App\Http\Controllers\Api\UserSubmissionsController;
use App\Http\Controllers\AuthController;
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

Route::get('/requests', [UserSubmissionsController::class, 'getAllSubmissions'])->middleware('auth:sanctum')->middleware('admin');

Route::post('/requests', [UserSubmissionsController::class, 'setSubmisson'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::put('/requests/{id}', [UserSubmissionsController::class, 'updateSubmit'])->middleware('auth:sanctum')->middleware('admin');
