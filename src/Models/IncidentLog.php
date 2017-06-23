<?php
namespace IncidentManagement\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentLog extends Model {

	protected $fillable = ['action','updated_by','created_at','incident_id'];

	public $timestamps = false;

	protected $dates = ['created_at'];

	public static function boot()
  {
      parent::boot();

      static::creating(function ($model) {
          $model->created_at = $model->freshTimestamp();
      });
  }


	public function incident()
	{
		return $this->belongsTo('IncidentManagement\Models\Incident');
	}

	public function updatedBy()
	{
		return $this->belongsTo('App\User','updated_by');
	}

}
