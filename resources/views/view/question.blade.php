@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>Q&A</h1>
            <hr>
            <h1>
                질문 : {{ $question->title }}
            </h1>
            <p>{{ $question->content }}</p>
        <hr>
        <div>
            <h3>Comment</h3>
            @forelse ($comments as $comment)
                <hr>
                        id :
                        {{ $comment->name }}
                        <br>
                        comment :
                        {{ $comment->comment }}
                        <br>
                        @if (isset(Auth::user()->name))
                            @if (Auth::user()->name == 'admin')
                                <form action="{{  route('comments.destroy', $comment->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="삭제"/>
                                </form>
                            @elseif(Auth::user()->name == $comment->name)
                                <form action="{{  route('comments.destroy', $comment->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="삭제"/>
                                </form>
                            @endif
                        @endif

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
            @if(isset(Auth::user()->name))
                @if (Auth::user()->name == 'admin')
                    <a class="btn btn-primary" href="{{ route('questions.edit', $question->id ) }}">수정</a>

                    <form action="{{  route('questions.destroy', $question->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="삭제"/>
                    </form>

                    <a class="btn btn-primary" href="{{ route('questions.index') }}">목록</a>
                @elseif(Auth::user()->name == $question->name)
                    <a class="btn btn-primary" href="{{ route('questions.edit', $question->id ) }}">수정</a>

                    <form action="{{  route('questions.destroy', $question->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="삭제"/>
                    </form>

                    <a class="btn btn-primary" href="{{ route('questions.index') }}">목록</a>
                @else
                @endif
            @endif
            <a class="btn btn-primary" href="{{ route('questions.index') }}">목록</a>        
    </div>
@endsection