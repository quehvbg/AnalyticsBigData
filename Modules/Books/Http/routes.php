<?php

Route::group(['middleware' => 'web', 'prefix' => 'books', 'namespace' => 'Modules\Books\Http\Controllers'], function()
{
    Route::get('/', [
        'as' => 'books.index',
        'uses' => 'BooksController@index']);
    Route::get('/create', [
        'as' => 'books.create',
        'uses' => 'BooksController@create']);
    Route::post('/store', [
        'as' => 'books.store',
        'uses' => 'BooksController@store']);
    Route::put('/update/{i}', [
        'as' => 'books.update',
        'uses' => 'BooksController@update']);
    Route::get('/show/{id}', [
        'as' => 'books.show',
        'uses' => 'BooksController@show']);
    Route::get('/edit/{i}', [
        'as' => 'books.edit',
        'uses' => 'BooksController@edit']);
    Route::get('/destroy/{i}', [
        'as' => 'books.destroy',
        'uses' => 'BooksController@destroy']);
});