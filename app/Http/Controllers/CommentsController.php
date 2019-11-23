<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        //

        $comment = $request->input('comment');

        $name = Auth::user()->name;

        $model = new \App\Comment;
        $model->comment = $comment;
        $model->question_id=$id;
        $model->name = $name;
        $model->save();

        if(! $model){
            return back()->with('flash_messagge', '댓글이 저장되지 않았습니다.')->withInput();
        }

        return  \App::make('redirect')->back()->with('flash_success', '댓글이 작성되었습!');

    }
    public function destroy($id)
    {
        //
        \App\Comment::destroy($id);

        return \App::make('redirect')->back()->with('flash_messsage','댓글이 삭제되었습니다.');
    }
}
