<?php

use Illuminate\Support\Facades\Route;
use Modules\BulkSMS\Http\Controllers\BulkSMSController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('bulksms', BulkSMSController::class)->names('bulksms');
});

Route::post('/bulksms/send', [BulkSMSController::class, 'sendBulkSMS']);
Route::post('/sms/send-single', [BulkSMSController::class, 'sendSingleSMS']);
Route::get('/bulksms/balance', [BulkSMSController::class, 'checkSMSStatus']);
