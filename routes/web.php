<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InflatableController;
use App\Http\Controllers\Admin\InteractiveController;
use App\Http\Controllers\Admin\CarnivalController;
use App\Http\Controllers\Admin\WaterController;
use App\Http\Controllers\Admin\ElectricalController;
use App\Http\Controllers\Admin\FunnyController;
use App\Http\Controllers\Admin\EntertainmentController;
use App\Http\Controllers\Admin\OutboundController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('postlogin', 'postLogin')->name('postlogin');
    Route::post('postregister', 'postregister')->name('register.post');
    Route::get('logout', 'logout')->name('logout');
});

// ADMIN
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    // DATA USER
    Route::resource('/admin/user', UserController::class);

    // DATA INFLATABLE
    Route::resource('/admin/inflatable', InflatableController::class);

    // DATA INTERACTIVE
    Route::resource('/admin/interactive', InteractiveController::class);

    // DATA CARNIVAL
    Route::resource('/admin/carnival', CarnivalController::class);

    // DATA WATER
    Route::resource('/admin/water', WaterController::class);

    // DATA ELECTRICAL
    Route::resource('/admin/electrical', ElectricalController::class);

    // DATA FUNNY
    Route::resource('/admin/funny', FunnyController::class);

    // DATA OUTBOUND
    Route::resource('/admin/outbound', OutboundController::class);

    // DATA ENTERTAINMENT
    Route::resource('/admin/entertainment', EntertainmentController::class);

    Route::resource('/admin/slides', \App\Http\Controllers\Admin\SlideController::class);
    Route::get('/admin/slides/{slideId}/up', [\App\Http\Controllers\Admin\SlideController::class, 'moveUp']);
    Route::get('/admin/slides/{slideId}/down', [\App\Http\Controllers\Admin\SlideController::class, 'moveDown']);
});

// TAMPILAN FRONTEND USER
Route::get('/frontend-dashboard', [FrontendController::class, 'index'])->name('frontend.dashboard');
Route::get('/frontend-about', [FrontendController::class, 'about'])->name('frontend.about');

Route::get('/frontend-inflatables', [FrontendController::class, 'inflatables'])->name('frontend.inflatables');
Route::get('/frontend-inflatables/detail/{id}', [FrontendController::class, 'inflatablesShow'])->name('frontend.inflatables-detail');
Route::post('/frontend-inflatables/sewa/{id}', [FrontendController::class, 'inflatablesSewa'])->name('frontend.inflatables-sewa');

Route::get('/frontend-interactive', [FrontendController::class, 'interactive'])->name('frontend.interactive');
Route::get('/frontend-interactive/detail/{id}', [FrontendController::class, 'interactiveShow'])->name('frontend.interactive-detail');
Route::post('/frontend-interactive/sewa/{id}', [FrontendController::class, 'interactiveSewa'])->name('frontend.interactive-sewa');

Route::get('/frontend-carnival', [FrontendController::class, 'carnival'])->name('frontend.carnival');
Route::get('/frontend-carnival/detail/{id}', [FrontendController::class, 'carnivalShow'])->name('frontend.carnival-detail');
Route::post('/frontend-carnival/sewa/{id}', [FrontendController::class, 'carnivalSewa'])->name('frontend.carnival-sewa');

Route::get('/frontend-water', [FrontendController::class, 'water'])->name('frontend.water');
Route::get('/frontend-water/detail/{id}', [FrontendController::class, 'waterShow'])->name('frontend.water-detail');
Route::post('/frontend-water/sewa/{id}', [FrontendController::class, 'waterSewa'])->name('frontend.water-sewa');

Route::get('/frontend-electrical', [FrontendController::class, 'electrical'])->name('frontend.electrical');
Route::get('/frontend-electrical/detail/{id}', [FrontendController::class, 'electricalShow'])->name('frontend.electrical-detail');
Route::post('/frontend-electrical/sewa/{id}', [FrontendController::class, 'electricalSewa'])->name('frontend.electrical-sewa');

Route::get('/frontend-funny', [FrontendController::class, 'funny'])->name('frontend.funny');
Route::get('/frontend-funny/detail/{id}', [FrontendController::class, 'funnyShow'])->name('frontend.funny-detail');
Route::post('/frontend-funny/sewa/{id}', [FrontendController::class, 'funnySewa'])->name('frontend.funny-sewa');

Route::get('/frontend-outbound', [FrontendController::class, 'outbound'])->name('frontend.outbound');
Route::get('/frontend-outbound/detail/{id}', [FrontendController::class, 'outboundShow'])->name('frontend.outbound-detail');
Route::post('/frontend-outbound/sewa/{id}', [FrontendController::class, 'outboundSewa'])->name('frontend.outbound-sewa');

Route::get('/frontend-entertainment', [FrontendController::class, 'entertainment'])->name('frontend.entertainment');
Route::get('/frontend-entertainment/detail/{id}', [FrontendController::class, 'entertainmentShow'])->name('frontend.entertainment-detail');
Route::post('/frontend-entertainment/sewa/{id}', [FrontendController::class, 'entertainmentSewa'])->name('frontend.entertainment-sewa');

Route::get('/frontend/check-out', [FrontendController::class, 'check_out'])->name('frontend.check-out');
Route::delete('/frontend/check-out/{id}', [FrontendController::class, 'delete'])->name('frontend.delete');
Route::get('/frontend/check-out/konfirmasi', [FrontendController::class, 'konfirmasiWhatsApp'])->name('frontend.konfirmasiWhatsApp');