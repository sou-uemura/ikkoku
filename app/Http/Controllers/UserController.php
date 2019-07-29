<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Score;
use App\Http\Requests\UserRequest;
use Auth;
use \Khill\Lavacharts\Lavacharts as Lava;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Score $score) 
    {
        $scores = [];

        $easy = $user->scores->avg('easy');
        $scores['easy'] = $easy;

        $speed = $user->scores->avg('speed');
        $scores['speed'] = $speed;

        $manner = $user->scores->avg('manner');
        $scores['manner'] = $manner;

        $understand = $user->scores->avg('understand');
        $scores['understand'] = $understand;

        $sum = 0;
        foreach($scores as $score) {
            $sum += $score;
        }

        return view('users.profile', [
            'user' => $user,
            'scores' => $scores,
            'sum' => $sum
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->id === Auth::id()){
              return view('users.edit', [
            'user' => $user
        ]);     
        } else {
            return redirect()->route('users.profile', $user->id); 
        }
    }

    

    /**
     * Display the specified resourcnamee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        if($request->icon){
            $user->icon = $request->icon->storeAs('public/icon', Auth::user()->id.'.jpg');
        }
        $user->name = $request->name;
        $user->twitter_id = $request->twitter_id;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->comment = $request->comment;
        $user->save();

        return redirect()->route('users.profile', $user->id); 
    }
}
