<?php

use Illuminate\Support\Facades\Route;
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


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

//Room types
Route::get('room/types', 'PagesController@roomTypes')->name('roomtypes');
Route::delete('room/types/{type}', 'RoomTypeController@destroy')->name('room.type.delete');
Route::get('room/types/{type}/edit', 'RoomTypeController@edit')->name('room.type.edit');
Route::get('room/types/create', 'RoomTypeController@create');
Route::put('room/types/{type}', 'RoomTypeController@update');
Route::post('room/types/data', 'RoomTypeController@index');
Route::get('room/types/data1', 'RoomTypeController@index1');
Route::post('room/types/store', 'RoomTypeController@store');

//Rooms
Route::put('rooms/{room}', 'RoomsController@update');
Route::get('rooms/room', 'PagesController@rooms');
Route::get('rooms/create', 'RoomsController@create');
Route::post('rooms/room/data', 'RoomsController@index');
Route::post('rooms/room/store', 'RoomsController@store');
Route::get('rooms/{room}/edit', 'RoomsController@edit');
Route::put('rooms/statusupdate/{room}', 'RoomsController@updateStatus');
Route::delete('rooms/{room}', 'RoomsController@destroy');

//Room Status
Route::get('rooms/statuses/data', 'RoomStatusController@index');

//Customers
Route::get('customers', 'PagesController@customers');
Route::post('customers/data', 'CustomersController@datatable');

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
