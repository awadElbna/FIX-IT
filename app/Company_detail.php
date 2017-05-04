<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company_detail extends Model
{

   use SoftDeletes;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User', 'company_id', 'id');
    }

}
