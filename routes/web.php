<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile');
Route::get('/tournament', function () {
    return view('tournament.index');
})->name('tournament');
Route::get('/tournament/overview', function () {
    return view('tournament.overview');
})->name('tournament.overview');

Route::get('/team', function () {
    return view('team.index');
})->name('team');
Route::get('/team/create', function () {
    return view('team.create');
})->name('team.create');
Route::get('/team/find', function () {
    return view('team.find');
})->name('team.find');
Route::get('/team/find/detail', function () {
    return view('team.detail');
})->name('team.detail');

Route::get('/help', function () {
    return view('help.index');
})->name('help');

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('player.login');
});
Route::get('/signup', function () {
    return view('player.signup');
})->name('signup');

Route::resource('game', 'GameController');
// Route::get('game', 'GameController@index');
