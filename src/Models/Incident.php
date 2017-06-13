<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model {
	use SoftDeletes;
	protected $fillable = ['name','description','incident_type_id','created_by','updated_by'];

	public function incidentTypes()
	{
		return $this->hasMany('IncidentManagement\Models\IncidentType');
	}

	public function createdBy()
	{
		return $this->belongsTo('App\User','created_by');
	}

	public function updatedBy()
	{
		return $this->belongsTo('App\User','updated_by');
	}

}
