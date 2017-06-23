<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidentType extends Model {

	use SoftDeletes;

	protected $fillable = ['name','description','form_id'];

	public function workstreams()
	{
		return $this->belongsToMany('WorkStream\Models\Workstream','incident_type_workstreams','incident_type_id','workstream_id');
	}

	public function form()
	{
		return $this->belongsTo('FormBuilder\Models\Form');
	}

	public function incidents()
	{
		return $this->hasMany('IncidentManagement\Models\Incident');
	}

}
