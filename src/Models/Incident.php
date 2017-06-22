<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model {
	use SoftDeletes;
	protected $fillable = ['name','description','incident_type_id','status_id','form_answer_id','created_by','updated_by','priority_id'];

	public function status()
	{
		return $this->belongsTo('IncidentManagement\Models\IncidentStatus','status_id');
	}

	public function priority()
	{
		return $this->belongsTo('IncidentManagement\Models\IncidentPriority','priority_id');
	}

	public function incidentType()
	{
		return $this->belongsTo('IncidentManagement\Models\IncidentType');
	}

	public function createdBy()
	{
		return $this->belongsTo('App\User','created_by');
	}

	public function formAnswer()
	{
		return $this->belongsTo('FormBuilder\Models\FormAnswer');
	}

	public function updatedBy()
	{
		return $this->belongsTo('App\User','updated_by');
	}

}
