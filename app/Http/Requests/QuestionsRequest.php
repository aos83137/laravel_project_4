<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules(){
        return [
            'title' => ['required'],
            'content' => ['required'],
        ];
    }
    public function messages(){
        return [
            'title.required'=>'제목은 필수 입력 항목입니다.',
            'content.required' => '내용은 필수 입력 항목입니다.'
        ];
    }

    public function attributes(){
        return [
            'title'=>'제목',
            'content' =>'본문',
        ];
    }


}
