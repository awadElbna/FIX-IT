<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Comment extends Model
{

    use SoftDeletes;

	public $timestamps = false;

	public function question(){
	    return $this->belongsTo('App\Question', 'question_id', 'id');
    }

    public function reply(){
	    return Comment::where('parent_id', '=', $this->id)->get();
    }
    public function users(){
	    return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function liked(){
      return $this->hasMany('App\Like');
    }
    public function like_or_not(){
      return Like::where('comment_id', '=', $this->id)->where('user_id', Auth::id())->first();
    }

}
