@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Q&A list</h1>
        <hr>
        <ul>
            @forelse ($questions as $question)
                <li>
                    <a href="{{ route('view.question', ['id' => $question->id]) }}">
                        {{ $question->title }} <small>by {{ $question->user->name }}</small>
                    </a>
                </li>
            @empty
                <p>질문을 등록해 주세요.</p>
            @endforelse
        </ul>
    </div>
    
    <div>
        <form action="">
            <a href="{{ route('view.register') }}">등록하기</a>
        </form>
    </div>

    @if ($questions->count())
        <div class="text-center">
            {!! $questions->render() !!}
        </div>
    @endif
@endsection