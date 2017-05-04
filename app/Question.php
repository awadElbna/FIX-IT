<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use Notifiable;
	use SoftDeletes;


	public $timestamps = false;

	protected function cat()
    {
        return $this->belongsTo('App\Cat', 'cat_id', 'id');
    }

    protected function comments()
    {
        return $this->hasMany('App\Comment')->where('parent_id', '=', 0);
    }

    protected function allComments()
    {
        return $this->hasMany('App\Comment');
    }

    protected function user()
    {
        return $this->belongsTo('App\User');
    }
}
