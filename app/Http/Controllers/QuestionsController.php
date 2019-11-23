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

    public function show($id){
        $question = \App\Question::find($id);
        $comments =  $question->comments()->get();
        return view('view.question',compact('question','comments'));
    }

    public function create(){
        return view('view.register');
    }

    public function store(\App\Http\Requests\QuestionsRequest $request){
        $question = \App\User::find(1)->articles()->create($request->all());

        if(! $question){
            return back()->with('flash_messagge', '질문이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('questions.index'))->with('flash_messsage','작성하신 질문이 저장되었습니다.');
    }
}
