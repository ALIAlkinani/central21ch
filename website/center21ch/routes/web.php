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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verify/{token}','VerifyController@verify')->name('verify');

Route::get('/poems/create', 'PoemsController@create');

Route::get('/poems/{channel}', 'PoemsController@index');
Route::get('/poems', 'PoemsController@index');

Route::post('/poems', 'PoemsController@store');


Route::get('/poems/{channel}/{poem}', 'PoemsController@show');



/* Route::resource('poems', 'PoemsController');
 */
Route::post('/poems/{channel}/{poem}/replies', 'RepliesController@store')->name('addReplies');

