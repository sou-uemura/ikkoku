<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Http\Requests\UserRequest;
use  App\Http\Controllers\Auth;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)

    {


        return view('users.profile', [
            'user' => $user

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
        return view('users.edit', [
            'user' => $user
        ]);  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)

    {

        $user->name = $request->name;
        $user->twitter_id = $request->twitter_id;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->comment = $request->comment;
        $user->save();

        return redirect()->route('users.profile', $user->id);
        
    }

}
