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
    return view('my_favorites');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/categories','HomeController@getByCategory');


Route::get('/profile','ProfileController@index')->name('profile');

Route::get('/','MyFavoritesController@index')->name('my_favorites');

Route::get('/favorite/categories','MyFavoritesController@getByCategory');
Route::get('/favorite/add/{id}', 'MyFavoritesController@addToFavorites');
Route::get('/favorite/remove/{id}', 'MyFavoritesController@delete');

Route::get('/film/{id}','FilmController@index')->name('film');


Route::get('/profile/update','ProfileController@update')->name('update');


Route::get('FilmController@addToFavorites')->name('addToFavorites');
