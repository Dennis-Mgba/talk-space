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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forum', [
    'uses' => 'ForumsController@index',
    'as' => 'forum'
]);

Route::get('{provider}/auth', [
    'uses' => 'SocialsController@auth',
    'as' => 'social.auth'
]);


Route::get('/{provider}/redirect', [
    'uses' => 'SocialsController@auth_callback',
    'as' => 'social.callback'
]);


Route::group(['middleware' => 'auth'], function(){  // create middleware route group to authenticate the routes for our application
    Route::resource('channels', 'ChannelsController'); // this will automatically read the funetions in the ChannelsController and make avaiable the routes need

    Route::get('discussion/create', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'
    ]);

    Route::post('discussions/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'
    ]);

    Route::get('/discussion/{slug}', [
        'uses' => 'DiscussionsController@show',
        'as' => 'discussion'
    ]);

});
