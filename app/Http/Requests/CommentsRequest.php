<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'comment'=>['required'],
        ];
    }

    public function messages(){
        return [
            'comment.required'=>'댓글을 입력해 주세요.',
        ];
    }

    public function attributes(){
        return [
            'comment'=>'댓글',
        ];
    }
}
