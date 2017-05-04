<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  public function comments(){
    return $this->belongsTo('App\Comment', 'comment_id', 'id');
  }

  
}
