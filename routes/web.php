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
        Route::get('profile/edit', 'PlayerAuthController@editProfile')->name('profile.edit');
        Route::put('profile', 'PlayerAuthController@updateProfile')->name('profile.update');
        Route::get('user-profile/{player}/detail', 'PlayerAuthController@userProfile')->name('user.profile');

        //Friend
        Route::get('friend', 'FriendController@index')->name('friend');
        Route::post('unfriend', 'FriendController@unfriend')->name('unfriend');
        Route::post('add-friend', 'FriendController@add_friend')->name('add-friend');
        Route::post('accept-friend', 'FriendController@accept_friend')->name('accept-friend');
        Route::post('decline-friend', 'FriendController@decline_friend')->name('decline-friend');

        //Team
        Route::get('team', 'TeamController@index')->name('team');
        Route::get('team-create', 'TeamController@team_create')->name('team-create');
        Route::post('team-create', 'TeamController@store')->name('team-store');
        Route::get('team-invitation', 'TeamController@team_invitation')->name('team-invitation');
        Route::post('team-accept', 'TeamController@team_acc')->name('team-accept');
        Route::post('teamreq-accept', 'TeamController@teamreq_acc')->name('teamreq-accept');
        Route::post('team-decline', 'TeamController@team_decline')->name('team-decline');
        Route::post('teamreq-decline', 'TeamController@teamreq_decline')->name('teamreq-decline');
        Route::post('team', 'TeamController@friendInvite')->name('team.friendInvite');
        Route::post('team-edit', 'TeamController@team_edit')->name('team.edit');
        Route::post('team-update', 'TeamController@team_update')->name('team.update');
        // Route::post('teamSponsor-delete', 'TeamController@teamSponsor_delete')->name('teamSponsor.delete');
        Route::post('team-view', 'TeamController@team_view')->name('team.view');
        Route::post('team-join', 'TeamController@team_join')->name('team.join');
        Route::post('team-leave', 'TeamController@team_leave')->name('team.leave');
        Route::post('team-disband', 'TeamController@team_disband')->name('team.disband');
        // Route::get('team-search', 'TeamController@team_search')->name('team-search');

        //Tournament
        Route::get('tournament', 'TournamentController@index')->name('tournament');
        Route::get('tournament/overview/{id}', 'TournamentController@detailTournament')->name('tournament.overview');
        Route::post('tournament/{id}/payment', 'TournamentController@joinTournament')->name('tournament.join');
        Route::get('tournament/payment/success', 'TournamentController@paymentSuccess')->name('tournament.success');
        // Route::post('tournament/payment/unfinish', 'TournamentController@payment')->name('tournament.payment');
        // Route::get('/tournament/payment/payment/error', 'TournamentController@payment')->name('tournament.payment');
        // Route::get('payment', 'TournamentController@payment')->name('tournament.payment');

        // Route::post('payments/notification', 'PaymentController@notification');
        // Route::get('payments/completed', 'PaymentController@completed');
        // Route::get('payments/failed', 'PaymentController@failed');
        // Route::get('payments/unfinish', 'PaymentController@unfinish');
    });
    //Search
    Route::get('search-result', 'SearchController@index')->name('search');
});


//admin
Route::group(['auth', 'admins'], function () {
    Route::namespace('Admin')->group(function () {
        //login
        Route::get('super-login', 'AdminAuthController@login');
        Route::post('super-login/post', 'AdminAuthController@postLogin')->name('super.postlogin');
        Route::get('super-dashboard', 'AdminAuthController@dashboard')->name('super.dashboard');
        Route::get('createadmin', 'AdminAuthController@createAdmin');
        Route::get('super-logout', 'AdminAuthController@logout')->name('super.logout');

        //game
        Route::get('super/game', 'GameController@index')->name('game.index');
        Route::get('super/game/create', 'GameController@create')->name('game.create');
        Route::post('super/game', 'GameController@store')->name('game.store');
        Route::get('super/game/{game}/edit', 'GameController@edit')->name('game.edit');
        Route::put('super/game/{game}', 'GameController@update')->name('game.update');
        Route::delete('super/game/{game}', 'GameController@destroy')->name('game.destroy');

        //event
        Route::get('super/event', 'EventController@index')->name('event.index');
        Route::get('super/event/create', 'EventController@create')->name('event.create');
        Route::post('super/event', 'EventController@updateAndStore')->name('event.update-and-store');
        Route::post('super/tempevent', 'EventController@tempStore')->name('temporary-event.store');
        Route::get('super/event/{tempevent}/edit', 'EventController@edit')->name('temporary-event.edit');
        Route::put('super/event/{event}', 'EventController@update')->name('event.update');
        Route::get('super/event/{event}', 'EventController@show')->name('event.show');
        Route::delete('super/event/{event}', 'EventController@destroy')->name('event.destroy');

        //overview
        Route::get('super/overview', 'OverviewController@index')->name('overview.index');

        //payment-players
        Route::get('super/info-payment', 'InfoPaymentController@index')->name('info.index');
        Route::put('super/info-payment/{join}', 'InfoPaymentController@update')->name('info.update');
        Route::delete('super/info-payment/{join}', 'InfoPaymentController@destroy')->name('info.destroy');

        //team-matches
        Route::get('super/team-matches', 'MatchController@index')->name('match.index');
        Route::get('super/team-matches/create', 'MatchController@create')->name('match.create');
        Route::post('super/event', 'MatchController@store')->name('match.store');
        Route::get('super/event/{match}', 'MatchController@edit')->name('match.edit');
        Route::put('super/event/{id}', 'MatchController@updateScore')->name('match.updateScore');
        Route::put('super/event/{id}', 'MatchController@updateDate')->name('match.updateDate');
        Route::delete('super/team-matches/{match}', 'MatchController@destroy')->name('match.destroy');
    });
});
