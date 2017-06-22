<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentPriority extends Model {

	protected $fillable = ['name'];

	public function incidents()
	{
		return $this->hasMany('IncidentManagement\Models\Incident');
	}

}
