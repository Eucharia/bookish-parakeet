<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('author', ['uses' => 'AuthorsController@getIndex']);

Route::get('authors', ['as' => 'authors', 'uses' => 'AuthorsController@getBio']);

Route::get('author/{id}', ['as' => 'author', 'uses' => 'AuthorsController@getView']);

Route::get('authors/new', ['as' => 'new_author', 'uses' => 'AuthorsController@getNew']);
Route::post('author/create', ['uses' => 'AuthorsController@create']);
Route::get('authors/{id}/edit', ['as' => 'edit_author', 'uses' => 'AuthorsController@getEdit']);
Route::put('author/update', ['uses' => 'AuthorsController@getUpdate']);