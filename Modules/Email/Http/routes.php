<?php

Route::group(['middleware' => 'web', 'prefix' => 'email', 'namespace' => 'Modules\Email\Http\Controllers'], function()
{
    Route::get('/', 'EmailController@index');
});
