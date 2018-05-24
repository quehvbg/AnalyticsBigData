<?php

Route::group(['middleware' => 'web', 'prefix' => 'facebook', 'namespace' => 'Modules\Facebook\Http\Controllers'], function()
{
    Route::get('/', 'FacebookController@index');
});
