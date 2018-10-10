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
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('verify/{token}','VerifyController@verify')->name('verify');

Route::get('/poems/create', 'PoemsController@create');
Route::patch('poems/{channel}/{poem}', 'PoemsController@update');

Route::get('/poems/{channel}', 'PoemsController@index');
Route::get('/poems', 'PoemsController@index')->name('home');
Route::get('/maps', 'PoemsController@map')->name('map');

Route::post('/poems', 'PoemsController@store')->name('poems');


Route::get('/profile/{user}','ProfilesController@show')->name('profile');


Route::get('/profile/{user}/notifications','UserNotificationsController@index');

Route::delete('/profile/{user}/notifications/{notification}','UserNotificationsController@destroy');
Route::get('api/users', 'Api\UsersController@index');


Route::get('/poems/{channel}/{poem}', 'PoemsController@show');
Route::post('/poems/{channel}/{poem}/subscriptions', 'PoemsSubscriptionsController@store');
Route::delete('/poems/{channel}/{poem}/subscriptions', 'PoemsSubscriptionsController@destroy');


Route::delete('/poems/{channel}/{poem}', 'PoemsController@destroy');

Route::delete('/replies/{reply}', 'RepliesController@destroy')->name('replies.destroy');

Route::patch('/replies/{reply}', 'RepliesController@update');

// best reply
Route::post('/replies/{reply}/best', 'BestRepliesController@store')->name('best-replies.store');



/* Route::resource('poems', 'PoemsController');
 */
Route::post('/poems/{channel}/{poem}/replies', 'RepliesController@store')->name('addReplies');
Route::get('/poems/{channel}/{poem}/replies', 'RepliesController@index');
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar'); 
Route::post('locked-poems/{poem}', 'LockedPoemsController@store')->name('locked-poems.store')->middleware('admin');
Route::delete('locked-poems/{poem}', 'LockedPoemsController@destroy')->name('locked-poems.destroy')->middleware('admin');

//translate
Route::get('/poems/{channel}/{poem}/translates', 'TranslatesController@index');
Route::post('/poems/{channel}/{poem}/translates', 'TranslatesController@store')->name('addTranslates');

Route::delete('/translates/{translate}', 'TranslatesController@destroy')->name('translates.destroy'); 
Route::patch('/translates/{translate}', 'TranslatesController@update')->name('translates.destroy');

//poets
Route::post('/poets', 'PoetsController@store')->name('poets');
Route::get('/poets', 'PoetsController@index')->name('poets.show');
Route::get('/poets/create', 'PoetsController@create')->name('poets');
Route::get('/poets/{poet}', 'PoetsController@show');