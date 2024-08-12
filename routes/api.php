<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentAccountChangingController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\StudentLevelEvaluationController;
use App\Http\Controllers\getPrepositionsDataController;
use App\Http\Controllers\getSoundController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
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

// Student Authentication Routes
Route::prefix('student-auth')->group(function () {
    Route::post('register', [StudentAuthController::class, 'register']);
    Route::post('login', [StudentAuthController::class, 'login']);
    Route::post('logout', [StudentAuthController::class, 'logout']);
    /* ->middleware('student-api');*/
});

Route::get('/letter',[CharacterController::class,'getCharacterData']);
Route::get('/prepositions', [ getPrepositionsDataController::class, 'getdata']);
   
Route::group(['middleware' => ['verified','auth:student-api']],function(){
 

});

//Route::middleware('student-api')->post('/student/update-name', [StudentAccountChangingController::class,'updateName']);
Route::middleware('auth:student-api')->post('/student/update-password', [StudentAccountChangingController::class,'updatePassword']);
Route::get('/students/{studentId}/levels/{levelId}/mark', [StudentLevelEvaluationController::class, 'getMarkForLevel']);
//Route::get('/prepositions', [ getPrepositionsDataController::class, 'getdata']);
Route::get('/verifyEmail', [StudentAuthController::class,'verifyEmail']);
Route::get('/student',[StudentAuthController::class,'stu']);

Route::get('/sound/{id}', [getSoundController::class, 'getSoundById']);