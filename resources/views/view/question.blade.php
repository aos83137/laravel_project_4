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
        @include('view.comment',['id' => $question->id])
    </div>
    <hr>
    <div>
        {{-- 밑의 기능들은 질문등록에 관한 것 
            수정 삭제는 본인인 경우만 나오게 만들어야함--}}
        <a href="{{ route('questions.edit', $question->id ) }}">수정</a>

        <form action="{{  route('questions.destroy', $question->id ) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" class="btn btn-danger" value="삭제"/>
        </form>

        <a href="{{ route('questions.index') }}">목록</a>

    </div>
@endsection