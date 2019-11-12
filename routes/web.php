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

use App\Events\newMessage;

//    ajax route
Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent');




Route::get('/product-details', 'UserController@productDetails')->name('product-details');


Route::get('/displayAds', 'UserController@displayAds')->name('displayAds');

Route::get('/filter', 'UserController@filter')->name('filter');


Route::get('/search', 'UserController@search')->name('search');
Route::get('/searchInitiator', 'UserController@searchInitiator')->name('searchInitiator');





/*client interfcae */


Route::get('/', 'UserController@homePage')->name('welcome');


Route::get('/welcome','UserController@homePage')->name('welcome');


Route::get('/membership', function () {
	return view('clients.membership');
})->name('membership');


Route::get('/faq', function () {
	return view('clients.faq');
})->name('faq');



Route::get('/blogArticle','UserController@blogArticle')->name('blogArticle');
Route::get('/blog','UserController@blog')->name('blog');





Route:: match (['get','post'],'/contact','UserController@contactUs')->name("contact");


//htsf = how to sell fast page
Route::get('/htsf', function () {
	return view('clients.htsf');
})->name('htsf');




Route:: match (['get','post'],'/admin','AdminController@login')->name("adminLogin");


Route:: match (['get','post'],'/userLogin','AdminController@userLogin')->name("userLogin");


Route:: get ('/logout','AdminController@logout');
Route:: get ('/userLogout','UserController@logout')->name("userLogout");


/* guarded User interface*/



Route:: group (['middleware'=>['clients']],function(){

	Route::post('/storeAdd', 'UserController@storeAdd')->name('storeAdd');

	Route::get('/postadd', 'UserController@postadd')->name('postadd');

	Route::get('/postaddCategory', 'UserController@postaddCategory')->name('postaddCategory');
	Route::get('/addFavorite', 'UserController@addFavorite')->name('addFavorite');

	Route::get('/rating', 'UserController@rating')->name('rating');









	Route::post('/deleteConversation', 'ChatController@deleteConversation')->name('deleteConversation');
	Route::get('/mychat', 'ChatController@index')->name('mychat');

	Route::post('/sendMessage', 'ChatController@sendMessage')->name('sendMessage');
	Route::post('/startConversation','ChatController@startConversation')->name('startConversation');

	Route::get('/loadMessage', 'ChatController@loadMessage')->name('loadMessage');

	//Route:: get ('/myadd','UserController@myadd')->name('myadd');

	Route:: match (['get','post'],'/myadd','UserController@myadd')->name("myadd");
	Route:: match (['get','post'],'/manageorder','UserController@manageorder')->name("manageorder");



	Route::get('/myfavorite','UserController@myfavorite')->name('myfavorite');



	Route::match(['get','post'],'/profile','UserController@manageProfile')->name('profile');
	Route::match(['get','post'],'/userUpdatPassword','UserController@userUpdatPassword')->name('userUpdatPassword');


Route::get('/myAccount','UserController@myAccount')->name('myAccount');






});


// end client interface







Route:: group (['middleware'=>['auth']],function(){
	
	Route:: match (['get','post'],'/manageBrand','AdminController@manageBrand')->name('manageBrand');
	Route:: get ('/manageUsers','AdminController@manageUsers')->name('manageUsers');
	Route:: get ('/manageRegions','AdminController@manageRegions')->name('manageRegions');
	Route:: get ('/manageCities','AdminController@manageCities')->name('manageCities');
	Route:: get ('/manageCategories','AdminController@manageCategories')->name('manageCategories');
	Route:: get ('/manageSubCategory','AdminController@manageSubCategory')->name('manageSubCategory');
	Route:: get ('/manageAds','AdminController@manageAds')->name('manageAds');
	Route:: get ('/deleteAd','AdminController@deleteAd')->name('deleteAd');



	Route:: get ('/readMail','AdminController@readMail')->name('readMail');




	Route:: get ('/allorders','AdminController@allorders')->name('allorders');
	Route:: get ('/pendingorder','AdminController@pendingorder')->name('pendingorder');
	Route:: get ('/canceledorder','AdminController@canceledorder')->name('canceledorder');
	Route:: get ('/deliveredorder','AdminController@deliveredorder')->name('deliveredorder');




    Route:: match (['get','post'],'/editRegion','AdminController@editRegion')->name('editRegion');



	Route:: get ('/inactivatedAds','AdminController@inactivatedAds')->name('inactivatedAds');
	Route:: get ('/activatedAds','AdminController@activatedAds')->name('activatedAds');
	Route:: get ('/blockedAds','AdminController@blockedAds')->name('blockedAds');
	Route:: get ('/vipRequest','AdminController@vipRequest')->name('vipRequest');
	Route:: get ('/vipAds','AdminController@vipAds')->name('vipAds');
	Route:: get ('/waitCollection','AdminController@waitCollection')->name('waitCollection');
	Route:: get ('/deleteUser','AdminController@deleteUser')->name('deleteUser');







	Route:: match (['get','post'],'/editAd','AdminController@editAd')->name('editAd');
	
	Route:: match (['get','post'],'/addNewAd','AdminController@addNewAd')->name('addNewAd');

	Route:: post ('/updateSubCategory','AdminController@updateSubCategory')->name('updateSubCategory');
	Route:: post ('/updateCategory','AdminController@updateCategory')->name('updateCategory');
	Route:: post ('/updateCity','AdminController@updateCity')->name('updateCity');
	Route:: post ('/addRegions','AdminController@addRegions')->name('addRegions');
	Route:: post ('/addCity','AdminController@addCity')->name('addCity');
	Route:: post ('/addCategory','AdminController@addCategory')->name('addCategory');
	Route:: post ('/addSubCategory','AdminController@addSubCategory')->name('addSubCategory');

	Route:: post ('/admin/manageUsers/updateUser','AdminController@updateUsers')->name('updateUsers');
	Route:: get ('/admin/manageUsers/blockUsers','AdminController@blockUsers')->name('blockUsers');

	Route:: get ('/admin/dashboard','AdminController@dashboard')->name("dashboard");
	Route:: match (['get','post'],'/admin/admin_change_password','AdminController@updatePassword')->name('admin_change_password');
});


Route:: get ('/userRegister','UserController@userRegister')->name('userRegister');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
