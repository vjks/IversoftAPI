<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class blog_posts extends Model
{
	/**
	* @var array
	*/
	protected $fillable = [
		'author' ,
  		'title' ,
  		'content' ,
  		'created_at',
  		'updated_at',
  	];
}
