<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        return view('view.question',compact('question','comments','user'));
    }

    public function create(){
        return view('view.register',[
            'question' => FALSE,
        ]);
    }

    public function store(\App\Http\Requests\QuestionsRequest $request){

        $id = Auth::user()->id;

        $question = \App\User::find($id)->questions()->create($request->all());

        if(! $question){
            return back()->with('flash_message', '질문이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('questions.index'))->with('flash_message','작성하신 질문이 저장되었습니다.');
    }

    public function edit($id)
    {
        //
        $question = \App\Question::find($id);

        return view('view.register', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\QuestionsRequest $request, $id)
    {
        //
        $question = \App\Question::find($id)->update($request->all());

        return redirect()->route('questions.show', [$id])->with('flash_message','질문이 수정되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \App\Question::destroy($id);

        return redirect(route('questions.index'))->with('flash_message','질문이 삭제되었습니다.');
    }
}
