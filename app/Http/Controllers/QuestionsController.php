<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //
    public function index(){
        //latest() : 쿼리 결과를 날짜 역순으로 정렬해 주는 도우미 메서드
        $questions = \App\Question::latest()->paginate(10);

        return view('list.question', compact('questions'));
    }
}
