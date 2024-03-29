<?php

use App\Http\Controllers\admin\AuthC;
use App\Http\Controllers\admin\ChairController;
use App\Http\Controllers\admin\DashboardC;
use App\Http\Controllers\admin\TamuC;
use App\Http\Controllers\guest\HomeC;
use App\Http\Controllers\guest\RsvpC;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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
// ================
//    User Guest
// ================
Route::get('/', [HomeC::class, 'index'])->name('home');
Route::post('/attendance-confirmation', [RsvpC::class, 'store'])->name('rsvp.store');
Route::get('/my-qrcode', [QrController::class, 'index'])->name('my-qr');

// ==================
//    User Admin
// ==================
Route::controller(AuthC::class)->group(function () {
    Route::get('/admin/login',  'login')->name('backoffice.login');
    Route::post('/admin/login',  'loginAction')->name('backoffice.login.action');
});
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::controller(DashboardC::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::get('/dashboard/daftar-tamu', 'listGuest')->name('dashboard.guest');

            Route::get('/scan-qr', 'scanQr')->name('scan');
        });
        // useless?
        Route::controller(TamuC::class)->group(function () {
            Route::get('/tamu-undangan', 'index')->name('tamu-undangan');

            Route::get('/tamu-undangan/{guest}/set-kursi', 'setKursi')->name('tamu-undangan.setKursi');
            Route::get('/tamu-undangan/{guest}/qr-code', 'qrCode')->name('tamu-undangan.qrCode');
            Route::post('/tamu-undangan/{guest}/set-kursi', 'storeKursi')->name('tamu-undangan.storeKursi');
            Route::post('/tamu-undangan/generate-kursi', 'generateRandomKursi')->name('tamu-undangan.generate-kursi');
        });

        // 
        Route::controller(ChairController::class)->group(function () {
            Route::get('/list-kursi',  'index')->name('chair.list');
            Route::post('/list-kursi',  'store')->name('chair.store');
            Route::post('/list-kursi/{chair}', 'updateOrDelete')->name('chair.update');
        });

        // untuk scan barcode yg telah disimpan
        Route::get('/qr-code/scan/{guest_id}', [QrController::class, 'scanQr'])->name('my-qr.scan');
    });
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});

//TESTING ROUTE
Route::get('/test/scan', function () {
    return view('backoffice.test.qr-scanner');
});
