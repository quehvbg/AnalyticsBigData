<?php

Route::group(['middleware' => 'web', 'prefix' => 'sms', 'namespace' => 'Modules\SMS\Http\Controllers'], function()
{
    Route::get('/', 'SMSController@index');
});
