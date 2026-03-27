<?php

use App\Http\Controllers\Api\V1\BedController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('/users', UserController::class);
Route::apiResource('/patients', PatientController::class);
Route::apiResource('/beds', BedController::class);
Route::put('/beds/{bed}/occupation', [BedController::class, 'allocatePatientToBed']);

