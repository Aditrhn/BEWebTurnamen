<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('game', 'GameController');
// Route::get('game', 'GameController@index');
