<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\DeviceAuthController;

Route::post('/agent/validate', [AgentController::class, 'validateAgent']);
Route::post('/device/request', [DeviceAuthController::class, 'requestCode']);
Route::post('/device/approve', [DeviceAuthController::class, 'approve']);
Route::get( '/device/status/{device_code}',[DeviceAuthController::class, 'status']);
Route::post( '/lab/submit',  [AgentController::class,'submit']);