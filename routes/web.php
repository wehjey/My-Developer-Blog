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
    $data = [
        'title' => 'My Developer Blog',
        'page' => 'Home'
    ];
    return view('pages.home',$data);
});

Route::get('/post', function () {
    $data = [
        'title' => 'My Developer Blog',
        'page' => 'post'
    ];
    return view('pages.post',$data);
});
