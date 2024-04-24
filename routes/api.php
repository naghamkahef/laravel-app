<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuardianAuthController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\GuardianAccountChangingController;
use App\Http\Controllers\StudentAccountChangingController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\StudentLevelEvaluationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "api" middleware group.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Guardian Authentication Routes
Route::prefix('parent-auth')->group(function () {
    Route::post('register', [GuardianAuthController::class, 'register']);
    Route::post('login', [GuardianAuthController::class, 'login']);
    Route::post('logout', [GuardianAuthController::class, 'logout']);
});

// Student Authentication Routes
Route::prefix('student-auth')->group(function () {
    Route::post('register', [StudentAuthController::class, 'register']);
    Route::post('login', [StudentAuthController::class, 'login']);
    Route::post('logout', [StudentAuthController::class, 'logout']);
});
Route::middleware('student-api')->post('/student/update-name', [StudentAccountChangingController::class,'updateName']);
Route::middleware('auth:student-api')->post('/student/update-password', [StudentAccountChangingController::class,'updatePassword']);

Route::middleware('guardian-api')->post('/parent/update-name', [GuardianAccountChangingController::class,'updateName']);
Route::middleware('auth:guardian-api')->post('/parent/update-password', [GuardianAccountChangingController::class,'updatePassword']);
Route::get('/characters/{id}', [CharacterController::class, 'show']);
Route::get('/characters/{id}/word', [CharacterController::class, 'getWord']);


Route::get('/students/{studentId}/levels/{levelId}/mark', [StudentLevelEvaluationController::class, 'getMarkForLevel']);
Route::post('/evaluations', [StudentLevelEvaluationController::class, 'store'])->middleware('auth:student-api');



