@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A</h1>
        <hr>
        <h1>
            질문 : {{ $question->title }}
        </h1>
        <p>{{ $question->content }}</p>
    </div>
    <hr>
    <div>
        @forelse ($comments as $comment)
            <hr>
                id :
                {{ $comment->name }}
                <br>
                comment :
                {{ $comment->comment }}
                <br>
            <hr>
        @empty
            
        @endforelse

    </div>
    <hr>
    <div>
        <fieldset>
            <input type="content" name="comment">
            <a href="">등록</a>
        </fieldset>
    </div>
    <hr>
    <div>
        {{-- 밑의 기능들은 질문등록에 관한 것 --}}
        <a href="">수정</a>
        <a href="">삭제</a>
        <a href="">등록</a>
    </div>
@endsection