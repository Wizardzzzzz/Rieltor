<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakeAdvertiseController;
use App\Http\Controllers\AdvertiseController;
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


Route::resource('advertisements', AdvertiseController::class);

Route::get('/',[HomeController::class,'index'])->name('home');

Route::prefix('admin')->group(function () {
  Route::get('action',[AdminController::class,'indexAction'])->name('advertisements.action');
    Route::get('archieve',[AdminController::class,'archieve'])->name('advertisements.archieve');
    Route::get('action/archieve/{id}',[AdminController::class,'addToArchieve'])->name('advertisements.addToArchieve');
    Route::get('users',[AdminController::class,'users'])->name('admin.users');
});

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Auth::routes();


