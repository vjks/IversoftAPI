<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
	// We might want to add a user role in the future.
	/**
	* @var array
	*/
	protected $fillable = [
		'label'
  	];

  	public function user() {
  		return $this->belongsTo( Users::class );
  	}
}
