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
})->name('welcome');

Route:: match (['get','post'],'/admin','AdminController@login');

Route:: get ('/logout','AdminController@logout');



Route:: group (['middleware'=>['auth']],function(){

	Route:: get ('/admin/manageUsers','AdminController@manageUsers')->name('manageUsers');

    Route:: get ('/admin/dashboard','AdminController@dashboard');
    Route:: match (['get','post'],'/admin/admin_change_password','AdminController@updatePassword');
});


Route:: get ('/userRegister','UserController@userRegister')->name('userRegister');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
