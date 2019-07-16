<?php

namespace App;

use App\Auth;
use Illuminate\Database\Eloquent\Model;

class AnswerRequest extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'question_id',
    ];

}
