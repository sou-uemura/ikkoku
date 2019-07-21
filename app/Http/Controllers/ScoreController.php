<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\User;
use App\Http\Requests\ScoreRequest;
use  App\Http\Controllers\Auth;

class ScoreController extends Controller
{

    public function index() 
    {
             

        return view('scores.score' [
            'user' => $user
        ]);

    }



    public function update(Score $score, Request $request)
    {

        $score->easy = $request->easy;
        $score->speed = $request->speed;
        $score->manner = $request->manner;
        $score->understand = $request->understand;
        $score->save();

        return redirect()->route('questions.index');
    }

}
