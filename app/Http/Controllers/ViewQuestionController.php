<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewQuestionController extends Controller
{
    //
    public function show($id){
        $question = \App\Question::find($id);
        $comments =  $question->comments()->get();
        return view('view.question',compact('question','comments'));
    }
}
