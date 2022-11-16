<?php


use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
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

//['middleware' => ['auth:myg']]


Route::group(['namespace'=>'Front',['middleware'=>'auth:client']],function (){


    Route::get('signin',[AuthController::class,'signin'])->name('signin');
    Route::post('doSign',[AuthController::class,'doSign'])->name('doSign');
    Route::get('signup',[AuthController::class,'index'])->name('signup');
    Route::post('signup',[AuthController::class,'store'])->name('sign');
    Route::post('logout',[AuthController::class,'logout'])->name('signout');
    Route::get('getcities/{id}',[AuthController::class,'getCities']);
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('about',[HomeController::class,'about'])->name('about');
    Route::get('donation',[HomeController::class,'donation'])->name('donation');
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    Route::post('contact-from',[HomeController::class,'contactForm'])->name('contactForm');
    Route::get('articles',[HomeController::class,'articles'])->name('articles');
    Route::post('toggleFavourite',[HomeController::class,'toggleFavourite'])->name('toggleFavourite');
    Route::get('blog/{id}',[HomeController::class,'blog'])->name('blog');
    Route::get('singleDonation/{id}',[HomeController::class,'singleDonation'])->name('singleDonation');
});

