<?php

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

//if(Auth::user()->lastName()=='admin')
Route::resource('advertisements', AdvertiseController::class);
//Route::get('/advertisement', function () {
//    return view('advertisement');
//});

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
Auth::routes();


