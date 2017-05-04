<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;


    use SoftDeletes;
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city', 'phone', 'img', 'cover', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function company()
    {
        return $this->hasOne('App\Company_detail', 'company_id');
    }


    public function senderMessages()
    {
        return $this->hasMany('App\Message', 'sender_id');
    }

    public function receiverMessages()
    {
        return $this->hasMany('App\Message', 'receiver_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function rates()
    {
        return $this->hasMany('App\Rating');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function sender_msg()
    {
        return $this->belongsToMany('App\User', 'messages', 'sender_id', 'receiver_id')->withPivot('msg', 'created');
    }

    public function receiver_msg()
    {
        return $this->belongsToMany('App\User', 'messages', 'receiver_id', 'sender_id')->withPivot('msg', 'created');
    }

    public function unreaded_receiver_msg()
    {
        return $this->belongsToMany('App\User', 'messages', 'receiver_id', 'sender_id')
            ->where('messages.readed_at', null)->distinct()->withPivot('sender_id');
    }

    public function received_msgs()
    {
        return $this->belongsToMany('App\User', 'messages', 'receiver_id', 'sender_id')
            ->distinct()->orderBy('messages.id', 'desc')
            ->withPivot('sender_id');
    }

    public function msgs($sender_id)
    {
        return Message::where('sender_id', $sender_id)->where('receiver_id', $this->id)
            ->orderBy('id', 'DESC')->first();
    }
}