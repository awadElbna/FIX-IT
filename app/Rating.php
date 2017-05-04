<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use carbon\Carbon;

class Rating extends Model
{
    
    public $timestamps = false;
    protected $dates = ['created_at'];
    public function users(){
        return $this->belongsTo('App\User', 'company_id');
    }

    public function user_rate() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
