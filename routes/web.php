<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    return view('welcome');
});

Auth::routes();

Route::resource('list','App\Http\Controllers\EventListController');

/*Route::get('/test', function(Request $request){
    $user = $request->user();
    dd($user->hasRole('admin'));
    dd($user->givePermissionsto('manage-event'));
    dd($user->can('manage-event'));

});*/

Route::group(['middleware' => 'role:admin'], function() {

    Route::get('admin/regrequest', [App\Http\Controllers\HomeController::class, 'RegRequest'])->name('regrequest');
    Route::get('status/{id}', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/donatelist', [App\Http\Controllers\HomeController::class, 'admindonatelist'])->name('admin.dlist');

    Route::resource('admin/events','App\Http\Controllers\EventController');

});

Route::group(['middleware' => 'role:user'], function() {
    Route::get('user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user/donate','App\Http\Controllers\DonationController');

});

Route::get('/list', [App\Http\Controllers\HomeController::class, 'eventList'])->name('list');

Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'Permission']);

