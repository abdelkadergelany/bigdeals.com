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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');




Route::get('/faq', function () {
    return view('faq');
})->name('faq');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//htsf = how to sell fast page
Route::get('/htsf', function () {
    return view('htsf');
})->name('htsf');




Route:: match (['get','post'],'/admin','AdminController@login');
Route:: post ('/userLogin','AdminController@userLogin');

Route:: get ('/logout','AdminController@logout');



Route:: group (['middleware'=>['auth']],function(){

	Route:: get ('/manageUsers','AdminController@manageUsers')->name('manageUsers');
	Route:: get ('/manageRegions','AdminController@manageRegions')->name('manageRegions');
	Route:: get ('/manageCities','AdminController@manageCities')->name('manageCities');

	Route:: post ('/addRegions','AdminController@addRegions')->name('addRegions');
	Route:: post ('/addCity','AdminController@addCity')->name('addCity');
	Route:: post ('/admin/manageUsers/updateUser','AdminController@updateUsers')->name('updateUsers');
	Route:: post ('/admin/manageUsers/blockUsers','AdminController@blockUsers')->name('blockUsers');

    Route:: get ('/admin/dashboard','AdminController@dashboard');
    Route:: match (['get','post'],'admin_change_password','AdminController@updatePassword')->name('admin_change_password');
});


Route:: get ('/userRegister','UserController@userRegister')->name('userRegister');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
