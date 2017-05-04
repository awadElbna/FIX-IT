<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    
	public $timestamps = false;


	public function questions(){
        return $this->hasMany('App\Question');
	}
	
}
