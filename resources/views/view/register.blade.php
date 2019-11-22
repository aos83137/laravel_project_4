@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A register</h1>
        <hr>
        <fieldset >
            <div>title</div>
            <div>
               <input type="text" name="title"> 
            </div>
            <div>conetent</div>
            <div>
                <textarea name="content" id="" cols="30" rows="10">
                </textarea>
            </div>
        </fieldset>
    </div>
    
    <div>
        <form action="">
            <a href="{{ route('list.question') }}">취소</a>
            <a href="">등록</a>
        </form>
    </div>
@endsection