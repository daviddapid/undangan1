<?php

use App\Http\Controllers\admin\AuthC;
use App\Http\Controllers\admin\DashboardC;
use App\Http\Controllers\admin\TamuC;
use App\Http\Controllers\guest\HomeC;
use App\Http\Controllers\guest\RsvpC;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// =============
// User Guest
// ===========
Route::get('/', [HomeC::class, 'index'])->name('home');
Route::post('/attendance-confirmation', [RsvpC::class, 'store'])->name('rsvp.store');
Route::get('/my-qrcode', [QrController::class, 'index'])->name('my-qr');

// ==========
// User Admin
// ==========
Route::controller(AuthC::class)->group(function () {
    Route::get('/admin/login',  'login')->name('admin.login');
    Route::post('/admin/login',  'loginAction')->name('admin.login.action');
});
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::controller(DashboardC::class)->group(function () {
            Route::get('/', 'index')->name('dasboard');
            Route::get('dashboard/daftar-tamu', 'listGuest')->name('dashboard.guest');
        });
        Route::controller(TamuC::class)->group(function () {
            Route::get('/tamu-undangan', 'index')->name('tamu-undangan');
        });
        Route::get('/qr-code/scan/{guest}', [QrController::class, 'scanQr'])->name('my-qr.scan');
    });
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});
