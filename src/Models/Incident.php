<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model {

	protected $fillable = ['name','description','created_by'];

}
