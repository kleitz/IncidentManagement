<?php
Route::get('ok',function(){
	return "okok success";
});

Route::group(['prefix'=> 'incident'],function()
	{
 Route::get('','IncidentManagement\Controllers\IncidentManagementController@index');
 Route::get('create','IncidentManagement\Controllers\IncidentManagementController@create');
 Route::post('create','IncidentManagement\Controllers\IncidentManagementController@store');
 Route::get('/edit/{id}','IncidentManagement\Controllers\IncidentManagementController@edit');
 Route::post('/edit/{id}','IncidentManagement\Controllers\IncidentManagementController@update');
 Route::get('/delete/{id}','IncidentManagement\Controllers\IncidentManagementController@destroy');
});