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

Route::get('/', 'NewsController@index')->name('news');
Route::get('/news/{news}', 'NewsController@show')->name('news.show');


/**
 * Manager routes
 */

Route::get('/manager', 'Manager\Controller@index')->name('manager');

/**
 * News
 */
Route::group(['prefix' => 'manager'], function() {
    Route::get('/news', 'Manager\NewsController@index')->name('manager.news.index');
    Route::get('/news/make', 'Manager\NewsController@make')->name('manager.news.make');
    Route::post('/news', 'Manager\NewsController@create')->name('manager.news.create');
    Route::get('/news/edit/{news}', 'Manager\NewsController@edit')->name('manager.news.edit');
    Route::patch('/news/{news}', 'Manager\NewsController@update')->name('manager.news.update');
    Route::delete('/news/{delete}', 'Manager\NewsController@delete')->name('manager.news.delete');
});
