<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Request_controller;
use App\Http\Controllers\Home_controller;
use App\Http\Controllers\User_history_controller;
use App\Http\Controllers\Manage_request_controller;
use App\Http\Controllers\Welfare_controller;
use App\Http\Controllers\Report_controller;
use Psy\Command\HistoryCommand;
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
    Route::get('/auto', [Request_controller::class, 'autocomplete'])->name('auto');
    Route::get('home', [Home_controller::class, 'home'])->name('home');

   Route::group(['middleware' => 'user:E'], function()
   {

   });

   Route::group(['middleware' => 'user:M'], function()
   {

   });

   Route::group(['middleware' => 'user:H'], function()
   {
        Route::get('/manage_welfare', [Welfare_controller::class, 'index'])->name('manage_welfare');
        Route::get('/manage_request', [Manage_request_controller::class, 'index'])->name('manage_request');
        Route::post('/add_welfare', [Welfare_controller::class, 'add_welfare'])->name('add_welfare');
        Route::post('/manage_welfare/edit', [Welfare_controller::class, 'edit_welfare'])->name('edit_welfare');
        Route::get('/report', [Report_controller::class, 'report'])->name('report');
   });

   Route::group(['middleware' => 'emplead'], function()
   {
        Route::get('/request/single', [Request_controller::class, 'single_request'])->name('s.request');
        Route::post('/request/single/create', [Request_controller::class, 'create_single'])->name('create.single');
        Route::get('/request/group', [Request_controller::class, 'group_request'])->name('group_request');
        Route::get('/history', [User_history_controller::class, 'index'])->name('history');
        Route::get('/history/{id}', [User_history_controller::class, 'show_request'])->name('show_history');
        Route::patch('/history/{id}/cancel', [User_history_controller::class, 'cancel'])->name('cancel');
        Route::get('/history', [User_history_controller::class, 'index'])->name('history');
        Route::post('/request/single/create', [Request_controller::class, 'create_single'])->name('create.single');
        Route::get('/history/{id}', [User_history_controller::class, 'show_request'])->name('show_history');
        Route::get('/request/group', [Request_controller::class, 'group_request'])->name('group_request');
        Route::post('/request/group/create', [Request_controller::class, 'create_group'])->name('create.group');
   });

   Route::group(['middleware' => 'hrlead'], function()
   {
        Route::get('/manage_request/{id}', [User_history_controller::class, 'show_approve'])->name('show_approve_request');
        Route::patch('/manage_request/{id}/comfirm', [Manage_request_controller::class, 'confirm_request'])->name('confirm');
   });
});
