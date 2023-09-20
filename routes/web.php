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
});

// TAMPILAN FRONTEND USER
Route::get('/frontend-dashboard', [FrontendController::class, 'index'])->name('frontend.dashboard');
Route::get('/frontend-inflatables', [FrontendController::class, 'inflatables'])->name('frontend.inflatables');
Route::get('/frontend-inflatables/detail/{id}', [FrontendController::class, 'inflatablesShow'])->name('frontend.inflatables-detail');
Route::post('/frontend-inflatables/sewa/{id}', [FrontendController::class, 'inflatablesSewa'])->name('frontend.inflatables-sewa');
Route::get('/frontend/check-out', [FrontendController::class, 'check_out'])->name('frontend.check-out');
Route::delete('/frontend/check-out/{id}', [FrontendController::class, 'delete'])->name('frontend.delete');
Route::get('/frontend/check-out/konfirmasi', [FrontendController::class, 'konfirmasi'])->name('frontend.konfirmasi');