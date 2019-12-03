<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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
            'name'=>['required'], // '필드'=>'검사조건'
            'body'=>['required'],
            'img'=>['required'],
        ];
    }
    public function attributes(){
        return [ 'name'=>'이름', 'body'=>'조원소개','img'=>'조원사진'];
    }
    public function message(){
        return [
            'required'=>':attribue은/는 필수 입력 항목임',
        ];
    }
}
