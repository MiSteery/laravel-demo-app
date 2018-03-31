<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/','BookController@abc');
*/

//Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['namespace'=>'Backend'], function(){
	Route::group(['middleware'=>'web','middleware'=>'auth','prefix'=>'admin'],function(){
		Route::get('/','DashboardController@index');
	});
});

// Route::group(['namespace'=>'Auth'], function(){
// 	Route::group(['middleware'=>'guest','middleware'=>'web'],function(){

// 	});
// });
// Route::group(['namespace'=>'Auth'], function(){
// 	Route::group(['middleware'=>'guest','middleware'=>'web'],function(){
// 		Route::get('login','AuthController@showLoginForm')->name('auth.login');
// 		Route::get('login','AuthController@login');
// 		Route::get('register','AuthController@showRegistrationForm')->name('auth.register');
// 		Route::get('register','AuthController@register');
// 		Route::get('logout','AuthController@logout')->name('auth.logout');

// 		Route::get('password/reset/{token?}','PasswordController@showResetForm')->name('auth.password.reset');
// 		Route::post('password/email','PasswordController@sendResetLinkEmail');
// 		Route::post('password/reset','PasswordController@reset');
// 	});
// });
/*Route::get('/','BookController@index');
Route::get('create','BookController@create');
Route::post('store','BookController@store')->name('book.save');
Route::get('delete/{id}','BookController@delete');
Route::get('edit/{id}','BookController@edit');
//Route::post('update','BookController@update')->name('book.save');
Route::post('update','BookController@update')->name('book.update');
*/
// Route::group(['prefix'=>'guest','middleware'=>'web'],function(){
// Route::get('product','ProductController@index');
// Route::get('product/show','ProductController@show');

// });
// Route::auth();

// Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
