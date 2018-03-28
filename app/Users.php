<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Users extends User
{
	/**
	* @var array
	*/
    protected $fillable = [
		  'user_roles_id',
  		'username',
  		'email',
  	];

  	public function role() {
  		return $this->hasOne(User_Roles::class); 
  	}

    public $timestamps = false;
}
