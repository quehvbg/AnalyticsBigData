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

Route::get('forbidden', [
    'as' => 'sk403',
    'uses' => 'HomeController@sk403'
]);

Route::get('page404', [
    'as' => 'sk404',
    'uses' => 'HomeController@sk404'
]);

Route::get('internal', [
    'as' => 'sk500',
    'uses' => 'HomeController@sk500'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', [
    'as' => 'profile',
    'uses' => 'HomeController@sk_profile'
]);

Route::get('settings', [
    'as' => 'settings',
    'uses' => 'HomeController@sk_settings'
]);
