<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Score extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'easy', 'speed','manner','understand',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
