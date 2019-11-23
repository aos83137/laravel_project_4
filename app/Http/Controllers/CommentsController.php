<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        //

        $comment = $request->input('comment');

        //이거 현재 로그인한 사람으로 바꿔야함 
        $user_id = 1; 
        
        $name = \App\User::find($user_id)->name;

        $model = new \App\Comment;
        $model->comment = $comment;
        $model->question_id=$id;
        $model->name = $name;
        $model->save();
        // return print($model);
        return  \App::make('redirect')->back()->with('flash_success', 'Thank you,!');

    }
}
