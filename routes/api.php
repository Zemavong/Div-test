<?php

use App\Http\Controllers\Api\UserRequestController;
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

Route::get('/', [UserRequestController::class, 'showAll'])->middleware('auth:sanctum');

Route::post('/', [UserRequestController::class, 'create'])->middleware('auth:sanctum');
Route::put('/requests/{id}', [UserRequestController::class, 'update'])->middleware('auth:sanctum')->middleware('admin');
Route::post('/requests', [UserRequestController::class, 'response'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);