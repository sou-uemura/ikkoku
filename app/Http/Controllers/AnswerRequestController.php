<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerRequest;
use App\Http\Requests\AnswerRequestRequest;
use  App\Http\Controllers\Auth;

class AnswerRequestController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $answerrequests = AnswerRequest::all();
        $answerrequests->load('user');

        return view('answerrequests.index', [
            'answerrequests' => $answerrequests
        ]);  

    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(AnswerRequestRequest $request)
    {

        $answerrequest = new AnswerRequest;
        $answerrequest->content = $request->content;
        $answerrequest->user_id = $request->user_id;
        $answerrequest->question_id = $request->question_id;
        $answerrequest->save();

        return redirect('/questions');
    }
}
