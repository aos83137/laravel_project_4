@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A list</h1>
        <hr>
        <ul>
            @forelse ($questions as $question)
                <li>
                    <a href="{{ route('questions.show', $question->id) }}">
                        {{ $question->title }} <small>by {{ $question->user->name }}</small>
                    </a>
                </li>
            @empty
                <p>질문을 등록해 주세요.</p>
            @endforelse
        </ul>
    </div>
    
    <div>
        <a href="{{ route('questions.create') }}">등록하기</a>
    </div>
    <hr>
    @if ($questions->count())
        <div class="text-center">
            {!! $questions->render() !!}
        </div>
    @endif
@endsection