<?php

Route::group(['middleware' => 'web', 'prefix' => 'company', 'namespace' => 'Modules\Company\Http\Controllers'], function()
{
    Route::get('/', 'CompanyController@index');
});
