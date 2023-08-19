<?php

use App\Http\Controllers\admin\AuthC;
use App\Http\Controllers\admin\ChairController;
use App\Http\Controllers\admin\CommentC;
use App\Http\Controllers\admin\DashboardC;
use App\Http\Controllers\admin\MasterController;
use App\Http\Controllers\admin\TamuC;
use App\Http\Controllers\guest\HomeC;
use App\Http\Controllers\guest\RsvpC;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
Route::put('/attendance-update/{user}', [RsvpC::class, 'update'])->name('rsvp.update');
Route::get('/my-qrcode', [QrController::class, 'index'])->name('my-qr');
Route::post('/send-comment', [HomeC::class, 'sendComment'])->name('send-comment');

// ==================
//    User Admin
// ==================
Route::controller(AuthC::class)->group(function () {
    Route::get('/admin/login',  'login')->name('backoffice.login');
    Route::get('/admin/logoutAction',  'logoutAction')->name('backoffice.logout.action');
    Route::post('/admin/login',  'loginAction')->name('backoffice.login.action');
});
Route::middleware('admin')->prefix('admin')->group(function () {

    Route::controller(DashboardC::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard/daftar-tamu', 'listGuest')->name('dashboard.guest');

        Route::get('/scan-qr', 'scanQr')->name('scan');
    });
    // useless?
    Route::controller(TamuC::class)->group(function () {
        Route::get('/tamu-undangan', 'index')->name('tamu-undangan');
        Route::get('/tamu-undangan/{guest}/qr-code', 'qrCode')->name('tamu-undangan.qrCode');
    });

    Route::controller(CommentC::class)->group(function () {
        Route::get('/comments', 'index')->name('admin.comment.index');
        Route::post('/comment/visiblity/{comment}', 'updateVisiblity')->name('admin.comment.update');
    });
    Route::controller(MasterController::class)->prefix('master')->name('master.')->group(function () {
        Route::get('/waktu-acara', 'waktuAcara')->name('waktu-acara');
        Route::post('/waktu-acara/{dday}', 'setWaktuAcara')->name('waktu-acara.update');

        Route::get('/couple-story', 'coupleStory')->name('coupleStory.index');
        Route::post('/couple-story', 'coupleStoryStore')->name('coupleStory.store');
        Route::put('/couple-story/{couplestory}', 'coupleStoryUpdate')->name('coupleStory.update');
        Route::delete('/couple-story/{couplestory}', 'coupleStoryDelete')->name('coupleStory.delete');
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

// URL::forceScheme('https');
