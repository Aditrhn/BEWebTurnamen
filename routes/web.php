<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auth:player'])->group(function () {
// Route::get('/', function () {
//     return view('player.index');
// });
// });
Route::group(['auth', 'players'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::namespace('Player')->group(function () {
        //Auth Player
        Route::get('login', 'PlayerAuthController@index')->name('login');
        Route::post('player-login', 'PlayerAuthController@postLogin')->name('post.login');
        Route::get('register', 'PlayerAuthController@register')->name('register');
        Route::post('player-register', 'PlayerAuthController@postRegister')->name('post.register');
        Route::get('dashboard', 'PlayerAuthController@dashboard')->name('dashboard');
        Route::get('logout', 'PlayerAuthController@logout')->name('logout');

        //Profile
        Route::get('profile', 'PlayerAuthController@profile')->name('profile');
    });
});


//admin
Route::namespace('Admin')->group(function () {
    //login
    Route::get('super-login', 'AdminAuthController@login');
    Route::post('super-login/post', 'AdminAuthController@postLogin')->name('super.postlogin');
    Route::get('super-dashboard', 'AdminAuthController@dashboard')->name('super.dashboard');
    Route::get('createadmin', 'AdminAuthController@createAdmin');

    //game
    Route::get('super/game', 'GameController@index');
    Route::get('super/game/create', 'GameController@create')->name('game.create');
    Route::post('super/game', 'GameController@store')->name('game.store');
    Route::get('super/game/{game}/edit', 'GameController@edit')->name('game.edit');
    Route::put('super/game/{game}', 'GameController@update')->name('game.update');
    Route::delete('super/game/{game}', 'GameController@destroy')->name('game.destroy');

    //event
    Route::get('super/event', 'EventController@index');
    Route::get('super/event/create', 'EventController@create')->name('event.create');
    Route::post('super/event', 'EventController@store')->name('event.store');
    Route::get('super/event/{event}/edit', 'EventController@store')->name('event.edit');
    Route::put('super/event/{event}', 'EventController@store')->name('event.update');
    Route::delete('super/event/{event}', 'EventController@destroy')->name('event.destroy');

    
});