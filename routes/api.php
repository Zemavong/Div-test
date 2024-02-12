<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserRequestsController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/{id}', [UserRequestsController::class, 'show'])->middleware('auth:sanctum');

Route::put('/requests/{id}', [UserRequestsController::class, 'update'])->middleware('auth:sanctum')->middleware('admin');

Route::post('/login', [AuthController::class, 'login'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);