<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manager', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::get('/editmanager/{id?}','AdminController@toCheck');
Route::get('/editmanager/forEdit/{id?}','AdminController@forEdit');
Route::get('/manager/confirm/sendEmail/{p_id?}','AdminController@toSendEmail');
Route::get('/manager/confirm/sendEmail/sendComplete/{p_id?}','AdminController@sendEmail');
Route::any('/manager/confirm/{id?}/{p_id?}','AdminController@confirm');
Route::any('/manager/forEdit/cancel/{id?}/','AdminController@cancel');


Route::any('/showproject',  'UserController@showproject');
Route::any('/profile/{id?}',  'UserController@profile');
Route::any('/edittime2/{id?}',  'UserController@edittime2');
Route::any('/mywaittime',  'UserController@mywaittime');
Route::any('/booking/addproject',  'UserController@addproject');
Route::any('/booking/addprojectdb',  'UserController@addproject_db');
Route::any('/booking/addFirst',  'UserController@firstAddBooking');
Route::any('/showproject',  'UserController@showproject');
Route::get('/addproject', 'AdminController@addproject' );
Route::any('/addproject_db/addprojectdb', 'AdminController@addproject_db' );
Route::any('/showstatic',  'UserController@showstatic');

Route::get('/table', 'UserController@showTable' );
Route::any('/admincheck/{id?}',  'UserController@admincheck');
Route::any('/table/submitted/{id?}',  'UserController@submitted');
Route::any('/setBooking/{id}', 'UserController@setBooking');
Route::any('/setBooking2/{id?}/{asd?}', 'UserController@setBooking2');
Route::any('/home/table/delete/booking_id1/{id?}', 'UserController@deleteBookingID1');
Route::any('/home/table/delete/booking_id2/{id?}', 'UserController@deleteBookingID2');
Route::any('/home/table/delete/booking_id3/{id?}', 'UserController@deleteBookingID3');
Route::any('/manager/forEdit/sliding/{type?}/{num?}','UserController@sliding');
Route::get('/user/sendmail', 'AdminController@send_email');

