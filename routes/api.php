<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


    Route::prefix('v1')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('profile',[AuthController::class,'profile']);
    Route::post('reset-Password',[AuthController::class,'resetPassword']);
    Route::post('password',[AuthController::class,'password']);




Route::group(['middleware'=>'auth:sanctum'],function (){

    Route::get('governments',[MainController::class,'government']);
    Route::get('cities',[MainController::class,'city']);
    Route::get('setting',[MainController::class,'setting']);
    Route::post('contact',[MainController::class,'contact']);
    Route::get('categories',[MainController::class,'category']);
    Route::get('posts',[MainController::class,'posts']);
    Route::get('blood-types',[MainController::class,'bloodType']);
    Route::post('toggle-favourite',[MainController::class,'postFavourite']);
    Route::get('myfavourite',[MainController::class,'myfavourite']);
    Route::post('register-token',[AuthController::class,'registerToken']);
    Route::post('remove-token',[AuthController::class,'removeToken']);
    Route::post('donation-request',[MainController::class,'donationRequest']);

});


});


