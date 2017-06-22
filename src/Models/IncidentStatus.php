<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentStatus extends Model {

	protected $fillable = ['name'];

	public function incidents()
	{
		return $this->hasMany('IncidentManagement\Models\Incident');
	}

}
