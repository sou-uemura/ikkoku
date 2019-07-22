<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerRequest;
use App\Http\Requests\AnswerRequestRequest;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\Question;




class AnswerRequestController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = \Auth::user();

        if($currentUser) {
            $questions = $currentUser->questions;

            return view('answerrequests.index', [
                'questions' => $questions
            ]);  
        } else {
            // Todo ログインしてないとき
            // redire
        }

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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnswerRequest $answerrequest)
    {

        $answerrequest->delete();

        return redirect()->route('answerrequest.index');
    }
}
