<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        //
        if($request->ajax()){
            $comment = $request->comment;
            
            $name = Auth::user()->name;
    
            $model = new \App\Comment;
            $model->comment = $comment;
            $model->question_id=$id;
            $model->name = $name;
            $model->save();
            
            $question = \App\Question::find($id);
            $comments =  $question->comments()->get();            if(! $model){
                return back()->with('flash_messagge', '댓글이 저장되지 않았습니다.')->withInput();
            }
            return response()->json([$comments,'comment' => $comment]);
            }else{
            
        }
        // return  \App::make('redirect')->back()->with('flash_success', '댓글이 작성되었습!');

    }
    public function destroy(Request $request, $id)
    {
        // //
        \App\Comment::destroy($id);
        if($request->ajax()){
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
        // return \App::make('redirect')->back()->with('flash_messsage','댓글이 삭제되었습니다.');
    }

}
