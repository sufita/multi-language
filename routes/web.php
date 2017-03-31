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


Route::get('/', ['as' => 'home', 'uses' => 'PostController@index']);

Route::get('post/{slug}', ['as' => 'post.show', 'uses' => 'PostController@show']);

Route::get(trans('routes.about'), ['as' => 'about', 'uses' => 'PageController@getAboutPage']);

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

//create
Route::get('create', 'PostController@create')->name('post.create');
Route::post('store', 'PostController@store')->name('post.store');
Route::post('/', 'PostController@index')->name('post.index');