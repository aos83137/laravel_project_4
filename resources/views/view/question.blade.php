@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A</h1>
        <h1>
            질문 : {{ $question->title }}
        </h1>
        <p>{{ $question->content }}</p>
    </div>
@endsection