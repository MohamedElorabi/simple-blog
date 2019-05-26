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


Route::get('/posts', 'PagesController@posts');

Route::get('/posts/{post}', 'PagesController@post');


Route::post('/posts/{post}/store', 'CommentsController@store');// admin


Route::get('/category/{name}', 'PagesController@category'); // editor - admin


//Auth
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');


Route::get('/logout', 'SessionsController@destroy');



Route::get('/access-denied', 'PagesController@accessDenied');

Route::get('/statistics', 'PagesController@statistics');




//test

Route::group(['middleware' => 'roles', 'roles'=> ['admin']], function() {

	Route::get('/admin', 'PagesController@admin');
	Route::post('/add-role', 'PagesController@addRole');

	Route::post('/settings', 'PagesController@settings');

});


Route::group(['middleware' => 'roles', 'roles'=> ['Editor', 'Admin']], function() {

	Route::get('/editor', 'PagesController@editor');
	Route::post('/posts/store', 'PagesController@store');

});

Route::group(['middleware' => 'roles', 'roles'=> ['User', 'Editor', 'Admin']], function() {

	Route::post('/like', 'PagesController@like')->name('like');
	Route::post('/dislike', 'PagesController@dislike')->name('dislike');

});