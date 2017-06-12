<?php
Route::group(['prefix'=> 'incident/type'],function()
{
 Route::get('','IncidentManagement\Controllers\IncidentTypeController@index');
 Route::get('create','IncidentManagement\Controllers\IncidentTypeController@create');
 Route::post('create','IncidentManagement\Controllers\IncidentTypeController@store');
 Route::get('/edit/{id}','IncidentManagement\Controllers\IncidentTypeController@edit');
 Route::post('/edit/{id}','IncidentManagement\Controllers\IncidentTypeController@update');
 Route::get('/delete/{id}','IncidentManagement\Controllers\IncidentTypeController@destroy');
});
