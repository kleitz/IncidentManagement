<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidentType extends Model {

	use SoftDeletes;

	protected $fillable = ['name','description'];

	public function workstreams()
	{
		return $this->belongsToMany('WorkStream\Models\Workstream','incident_type_workstreams','incident_type_id','workstream_id');
	}

	public function forms()
	{
		return $this->belongsToMany('FormBuilder\Models\Form','incident_type_forms');
	}

}
