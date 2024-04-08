<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('news', array('as' => 'news.index', 'uses' => 'NewsController@index'));
Route::get('news/add', array('as' => 'news.create', 'uses' => 'NewsController@create'));
Route::post('news/store', array('as' => 'news.store', 'uses' => 'NewsController@store'));
Route::get('news/edit/{id}', array('as' => 'news.edit', 'uses' => 'NewsController@edit'));
Route::patch('news/update/{id}', array('as' => 'news.update', 'uses' => 'NewsController@update'));
Route::delete('news/delete/{id}', array('as' => 'news.destroy', 'uses' => 'NewsController@destroy'));
Route::get('news/{slug}', array('as' => 'news.show', 'uses' => 'NewsController@show'));
