<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\User;
use App\AnswerRequest;
use APP\Http\ontrollers\UserController;
use App\Http\Requests\ScoreRequest;
use App\Http\Controllers\Auth;
// use App\Http\Controllers\Answerrequest;


class ScoreController extends Controller
{

    public function create(User $user, AnswerRequest $answerrequest) 
    { 
        // dd($user);


        return view('scores.create' ,[
            'user' => $user
        ]);



    }



    public function update(Score $score, Request $request)
    {
        $score->user_id = $request->user_id;
        $score->easy = $request->easy;
        $score->speed = $request->speed;
        $score->manner = $request->manner;
        $score->understand = $request->understand;
        $score->save();

        return redirect()->route('questions.index');
    }

}
