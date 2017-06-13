<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidentDetail extends Model {

	use SoftDeletes;
	protected $fillable = ['incident_id','form_answer_id','form_id'];

}
