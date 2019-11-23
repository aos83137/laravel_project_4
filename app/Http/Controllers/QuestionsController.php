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
        $question = \App\User::find(1)->questions()->create($request->all());

        if(! $question){
            return back()->with('flash_messagge', '질문이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('questions.index'))->with('flash_messsage','작성하신 질문이 저장되었습니다.');
    }

    public function edit($id)
    {
        //
        return __METHOD__.'은 다음의 기본키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.'.'$id';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return __METHOD__.'은 다음의 기본키를 가진 Article 모델을 수정합니다.'.$id;
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
        return __METHOD__.'은 다음의 기본키를 가진 Article 모델을 파괴합니다.'.'$id';
    }

}
