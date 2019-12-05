@extends('layouts.app')

@section('content')
<style>
    .link {
        text-decoration: none;
    }
    .link:link{color: black;  text-decoration: none;}
    .link:visited{color:gray;}
    .link:hover{color: blue; font-weight: bold;}
    .link:active{color: red;}

</style>
    <div class="container">
        {{-- flash_message 코드임 --}}
        @if (session()->has('flash_message'))
            <div class="alert alert-info" role="alert">
                {{ session('flash_message') }}
            </div>    
        @endif
        {{-- flash_message 코드임 --}}
        <h1>Q&A List</h1>
        <hr>
        <table class="table table-striped table-hover">
            <tr>
                <th class="text-center" style="width: 10%">번호</th>
                <th class="text-center" style="width: 65%">제목</th>
                <th class="text-center" style="width: 10%">글쓴이</th>
                <th class="text-center" style="width: 15%">작성일</th>
            </tr>
            @forelse ($questions as $question)
                <tr href="{{ route('questions.show', $question->id) }}">
                    <th class="text-center">{{ $loop->index+1 }}</th>
                    <td>
                        <a class="link" href="{{ route('questions.show', $question->id) }}">
                            {{ $question->title }}
                        </a>
                    </td>
                    <td class="text-center">{{ $question->user->name }}</td>
                    <td class="text-center">{{ explode(' ',$question->created_at)[0] }}</td>
                </tr>
            @empty
                <p>질문을 등록해 주세요.</p>
            @endforelse
        </table>
    
    <div class="text-right" >
        @auth
            <a class="btn btn-primary" href="{{ route('questions.create') }}">등록하기</a>

        @endauth
        @guest
            <p>질문 등록을 위해 로그인을 해 주세요.</p>
        @endguest
    </div>
    <hr>
        <div class="text-center">
            @if ($questions->count())
                    {!! $questions->render() !!}
            @endif
        </div>
    </div>
@endsection