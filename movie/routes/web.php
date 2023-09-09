<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\genreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\movieController;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',[indexController::class,'home'])->name('home1');
Route::get('/danh-muc/{slug}',[indexController::class,'category'])->name('category');
Route::get('/the-loai/{slug}',[indexController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[indexController::class,'conntry'])->name('country');
Route::get('/phim',[indexController::class,'movie'])->name('movie');
Route::get('/xem-phim',[indexController::class,'watch'])->name('watch');
Route::get('/episode',[indexController::class,'episode'])->name('episode');
Route::resource('category', categoryController::class);
Route::resource('genre', genreController::class);
Route::resource('country', countryController::class);
Route::resource('movie', movieController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
