<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstantTrackingController;
use App\Http\Controllers\AppointmentReminderController;
use App\Http\Controllers\AppointmentMissedController;
use App\Http\Controllers\CovidVaccineReminderController;

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

Route::get('/tracking', [InstantTrackingController::class,'instant']);
Route::get('/reminder',[AppointmentReminderController::class,'remind']);
Route::get('/missed',[AppointmentMissedController::class,'missed']);
Route::get('/covid',[CovidVaccineReminderController::class,'reminder']);

