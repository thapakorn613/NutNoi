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

Route::get('/home', 'HomeController@index')    
    ->name('home');

Route::get('/manager', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::any('/manager/{id?}','AdminController@toCheck');
Route::any('/manager/confirm/{id?}/{asd?}','AdminController@confirm');
Route::any('/manager/forEdit/{id?}','AdminController@forEdit');

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/profile/{id?}',  'UserController@profile');

Route::any('/admincheck/{id?}',  'UserController@admincheck');

Route::get('/home/table', function () {
    $timebookingTable = DB::table('timebooking')->get();
    $id = Auth::user()->project_id;
    
    return view('showTable', ['timebookingTable' => $timebookingTable],['id' => $id]);
});

Route::any('setBooking/{id}', 'UserController@setBooking');

Route::get('/home', 'HomeController@index')->name('home');
