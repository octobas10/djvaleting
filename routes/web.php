<?php

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

Route::get('/', function () {
    return view('customer');
})->name('customers');

Route::resource('/bookings', App\Http\Controllers\BookingsController::class);
Route::get('/bookingstatus/{id?}', 'App\Http\Controllers\BookingsController@bookingstatus')->name('bookingstatus');
Route::match(['get', 'post'], '/bookinginfo', 'App\Http\Controllers\BookingsController@bookinginfo')->name('bookinginfo');


Route::get('bookingdelete/{id?}', 'App\Http\Controllers\BookingsController@bookingdelete')->name('bookingdelete');
//Route::get('bookingprocess',function(){ dd('a'); })->name('bookingprocess');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/newbooking', [App\Http\Controllers\HomeController::class, 'newbooking'])->name('newbooking');
Route::post('/newbookingcreate', [App\Http\Controllers\HomeController::class, 'newbookingcreate'])->name('newbookingcreate');
Route::get('/bookingedit/{id?}', [App\Http\Controllers\HomeController::class, 'bookingedit'])->name('bookingedit');
Route::post('/bookingupdate', [App\Http\Controllers\HomeController::class, 'bookingupdate'])->name('bookingupdate');