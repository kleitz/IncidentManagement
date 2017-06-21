<?php
Route::group(['prefix'=> 'incident/type','middleware'=>['auth','roles']],function()
{
 Route::get('','IncidentManagement\Controllers\IncidentTypeController@index');
 Route::get('create','IncidentManagement\Controllers\IncidentTypeController@create');
 Route::post('create','IncidentManagement\Controllers\IncidentTypeController@store');
 Route::get('view/{id}','IncidentManagement\Controllers\IncidentTypeController@show');
 Route::get('/edit/{id}','IncidentManagement\Controllers\IncidentTypeController@edit');
 Route::post('/edit/{id}','IncidentManagement\Controllers\IncidentTypeController@update');
 Route::get('/delete/{id}','IncidentManagement\Controllers\IncidentTypeController@destroy');
});

Route::group(['prefix'=> 'incident','middleware'=>['auth','roles']],function()
{
 Route::get('','IncidentManagement\Controllers\IncidentController@index');
 Route::get('create','IncidentManagement\Controllers\IncidentController@create');
 Route::post('create','IncidentManagement\Controllers\IncidentController@store');
 Route::get('/edit/{id}','IncidentManagement\Controllers\IncidentController@edit');
 Route::get('/view/{id}','IncidentManagement\Controllers\IncidentController@show');
 Route::post('/edit/{id}','IncidentManagement\Controllers\IncidentController@update');
 Route::get('/delete/{id}','IncidentManagement\Controllers\IncidentController@destroy');
});
