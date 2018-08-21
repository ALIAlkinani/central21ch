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

Route::get('/poems/{channel}', 'PoemsController@index');
Route::get('/poems', 'PoemsController@index');

Route::post('/poems', 'PoemsController@store')->name('home');


Route::get('/profile/{user}','ProfilesController@show')->name('profile');


Route::get('/profile/{user}/notifications','UserNotificationsController@index');

Route::delete('/profile/{user}/notifications/{notification}','UserNotificationsController@destroy');
Route::get('api/users', 'Api\UsersController@index');


Route::get('/poems/{channel}/{poem}', 'PoemsController@show');
Route::post('/poems/{channel}/{poem}/subscriptions', 'PoemsSubscriptionsController@store');
Route::delete('/poems/{channel}/{poem}/subscriptions', 'PoemsSubscriptionsController@destroy');


Route::delete('/poems/{channel}/{poem}', 'PoemsController@destroy');

Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::patch('/replies/{reply}', 'RepliesController@update');



/* Route::resource('poems', 'PoemsController');
 */
Route::post('/poems/{channel}/{poem}/replies', 'RepliesController@store')->name('addReplies');

Route::get('/poems/{channel}/{poem}/replies', 'RepliesController@index');