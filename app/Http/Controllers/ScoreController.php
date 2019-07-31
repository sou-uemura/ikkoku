<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\User;
use App\AnswerRequest;
use App\Http\Requests\ScoreRequest;

class ScoreController extends Controller
{

    public function create(User $user, AnswerRequest $answerrequest) 
    { 
        $scores = [
            [
                'title' => 'わかりやすさ',
                'name' => 'easy'
            ],
            [
                'title' => '教える早さ',
                'name' => 'speed'
            ],
            [
                'title' => 'マナー',
                'name' => 'manner'
            ],
            [
                'title' => '問題の解決度',
                'name' => 'understand'
            ],
        ];

        return view('scores.create' ,[
            'user' => $user,
            'scores' => $scores
        ]);
    }

    public function store(Request $request)
    {

        $score = new score();

        $score->user_id = $request->user_id;
        $score->easy = $request->easy;
        $score->speed = $request->speed;
        $score->manner = $request->manner;
        $score->understand = $request->understand;
        $score->save();

        if($score->save()) {
            $answerrequest = AnswerRequest::find($request->answer_request_id);
            $answerrequest->delete();
        }

        return redirect()->route('questions.index');
    }

}
