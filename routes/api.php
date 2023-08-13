<?php

use App\Http\Controllers\admin\TamuC;
use App\Http\Controllers\QrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// untuk scan barcode yg telah disimpan
Route::get('/qr-code/scan/{guest_id}', [QrController::class, 'scanQr'])->name('my-qr.scan');
