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

Route::get('/profile', function(){
    $profile = DB::table('users')->get();
    $booking = DB::table('timebooking')->get();
    return view('profile', ['profile' => $profile],['booking' => $booking]);
});

Route::get('/home/table', function () {

    $projectTable = DB::table('project')->get();

    return view('showTable', ['projectTable' => $projectTable]);
});