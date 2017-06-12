<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model {

	protected $fillable = ['name','description','created_by'];

	public function worksreams()
	{
		return $this->belongsToMany('WorkStream\Models\Workstream','incident_type_workstreams','incident_type_id','workstream_id');
	}

}
