<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserHistoryController;
use Psy\Command\HistoryCommand;
use App\Http\Controllers\CustomAuthController;
use Termwind\Components\Hr;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{

    Route::get('home', [HomeController::class, 'home'])->name('home');

   Route::group(['middleware' => 'user:E'], function()
   {

   });

   Route::group(['middleware' => 'user:M'], function()
   {
   });

   Route::group(['middleware' => 'user:H'], function()
   {

   });

   Route::group(['middleware' => 'emplead'], function()
   {
        Route::get('request/single', [RequestController::class, 'single_request'])->name('s.request');
        Route::get('history', [UserHistoryController::class, 'index'])->name('history');
        Route::post('/create', [RequestController::class, 'create_single'])->name('create.single');
        Route::get('/history/{id}', [UserHistoryController::class, 'show'])->name('show');
        Route::get('/cancel/{id}', [UserHistoryController::class, 'cancel'])->name('cancel');
   });
});
