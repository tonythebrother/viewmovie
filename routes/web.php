<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/guests', 'IndexController@index')->name('guests');

Route::apiResource('/trailers', 'TrailersController');

Route::apiResource('/comments', 'CommentsController');