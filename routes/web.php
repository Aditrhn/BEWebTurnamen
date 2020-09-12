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

Route::get('game', 'GameController@index');
Route::get('game/create', 'GameController@create')->name('game.create');
Route::post('game', 'GameController@store')->name('game.store');
Route::get('game/{game}/edit', 'GameController@edit')->name('game.edit');
Route::put('game/{game}', 'GameController@update')->name('game.update');
Route::delete('game/{game}', 'GameController@destroy')->name('game.destroy');
