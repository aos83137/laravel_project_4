<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewQuestionController extends Controller
{
    //
    public function show($id){
        $question = \App\Question::find($id);

        return view('view.question',compact('question'));
    }
}
