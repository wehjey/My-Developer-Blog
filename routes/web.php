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


Route::get('/', 'PostController@home');

Route::get('/post/{slug}', 'PostController@show')->name('view');


/*
*
*   ADMINISTRATIVE ROUTES
*
*/
Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
    Route::get('posts', 'AdminController@showPosts')->name('posts');
    Route::get('add_post', 'AdminController@showAddPost')->name('add_post');
    Route::post('add_post', 'AdminController@insertPost')->name('insert_post');
    Route::get('publish/{slug}', 'AdminController@publishPost')->name('publish');
    Route::get('suspend/{slug}', 'AdminController@suspendPost')->name('suspend');
    Route::get('edit/{slug}', 'AdminController@editPost')->name('edit');
    Route::get('discard/{slug}', 'AdminController@discardPost')->name('discard');

});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
