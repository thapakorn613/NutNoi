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

//Route::get('/home/table', 'HomeController@showTable');

Route::get('/home/table', function () {
    $timebookingTable = DB::table('timebooking')->get();
    $id = Auth::user()->project_id;
    
    return view('showTable', ['timebookingTable' => $timebookingTable],['id' => $id]);
});

Route::any('setBooking/{id}', 'UserController@setBooking');