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
Route::get('upload', ['uses' => 'UploadController@getUpload']);
Route::post('/handleUpload', ['uses' => 'UploadController@handleUpload']);
Route::post('/handleDownload', ['uses' => 'UploadController@handleDownload']);
Route::get('repos', 'RepoController@getAllRepos');

Route::get('/repos/{id}', 'RepoController@getMessage');
Route::get('/deletedFiles/{id}', ['as' => 'deleted', 'uses' => 'UploadController@deleteFile']);
Route::get('/repo', 'RepoController@getRepo');
Route::get('add/new', ['as' => 'add_new', 'uses' => 'MembershipController@getNew']);
Route::get('categories', 'CategoryController@getView');
Route::get('categories/{id}', 'CategoryController@getAccessories');