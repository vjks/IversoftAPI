<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_addresses extends Model
{
	/**
	* @var array
	*/
	protected $fillable = [
  		'user_id',
  		'address',
  		'province',
  		'city',
  		'country',
  		'postal_code',
  	];

    public $timestamps = false;
}
