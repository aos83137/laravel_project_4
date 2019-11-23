@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A등록</h1>
        <hr>
        
        @if (! $question)
            <form action="{{ route('questions.store') }}" method="POST">
              @csrf
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" name="title" id=title" value="" class="form-control">
                    {!! $errors->first('title', '<span class="form-error">:message</span>') !!}

                </div>

                <div class="form-group" >
                    <label for="content">본문</label>
                    <textarea name="content" id="content" rows="10" class="form-control"></textarea>
                    {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <a href="{{ route('questions.index') }}">취소</a>
                    <input type="submit" class="btn btn-danger" value="등록"/>        
                </div>
            </form>

        @else
            <form action="{{  route('questions.update', $question->id ) }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="title">제목</label>
                        <input type="text" name="title" id=title" value="{{ $question->title }}" class="form-control">
                        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}

                        <label for="content">본문</label>
                        <textarea name="content" id="content" rows="10" class="form-control">{{ $question->content }}
                        </textarea>
                        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}

                        <a href="{{ route('questions.show',$question->id) }}">취소</a>
                        @method('PATCH')
                        <input type="submit" class="btn btn-danger" value="수정"/>
                    </div>
            </form>
                
        @endif
    </div>
@endsection