<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Question extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function answerRequests()
    {
        return $this->hasMany('App\AnswerRequest');
    }
}
