<?php

Route::group(['middleware' => 'web', 'prefix' => 'report', 'namespace' => 'Modules\Report\Http\Controllers'], function()
{
    Route::get('/', 'ReportController@index');
});
