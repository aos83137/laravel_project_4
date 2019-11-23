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

        //이거 현재 로그인한 사람으로 바꿔야함 
        $name = Auth::user()->name;

        $model = new \App\Comment;
        $model->comment = $comment;
        $model->question_id=$id;
        $model->name = $name;
        $model->save();
        // return print($model);
        return  \App::make('redirect')->back()->with('flash_success', '댓글이 작성되었습!');

    }
    public function destroy($id)
    {
        //
        \App\Comment::destroy($id);

        return \App::make('redirect')->back()->with('flash_messsage','댓글이 삭제되었습니다.');
    }
}
