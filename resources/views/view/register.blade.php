@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A등록</h1>
        <hr>

        <form action="{{ route('questions.store') }}" method="POST">
            {!!  csrf_field() !!}
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
                <button type="submit" class="btn btn-primary">
                    저장하기
                </button>
            </div>
        </form>
    </div>

@endsection