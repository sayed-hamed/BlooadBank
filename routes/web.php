<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DonationController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

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





Route::get('/login',function (){
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles',RolesController::class);

    Route::resource('users',UserController::class);

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

    Route::resource('governorate',GovernorateController::class);
    Route::resource('city',CityController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('client',ClientController::class);
    Route::resource('contact',ContactController::class);
    Route::resource('setting',SettingController::class);
    Route::resource('donation',DonationController::class);
    Route::get('changeStatus/{id}',[ClientController::class,'changeStatus'])->name('changeStatus');


});
