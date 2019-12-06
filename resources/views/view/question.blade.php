@extends('layouts.app')

@section('content')
<style>
    html,body{
        background: linear-gradient(to right, #F8ECE0,#A9F5D0);
    }
    .delete-form{
        display: inline;
    }
    .p_text{
        height:200px;
    }
    .h1{
        font-size:xx-large;
    }
</style>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        {{-- flash_message 코드임 --}}
        @if (session()->has('flash_message'))
            <div class="alert alert-info" role="alert">
                {{ session('flash_message') }}
            </div>    
        @endif
        {{-- flash_message 코드임 --}}
        {{-- 질문 div --}}
        <div>
            <h1 style="font-size:70px" align="center">Q&A</h1>
            <hr>
            <h2 align="center">
                {{ $question->title }}
            </h2>
            <h6 align="right">질문자 : {{ $question->user->name }}</h6>
            <hr>
            <div class="p_text">
            {{ $question->content }}
            </div>
            <hr>
        </div>
        


        {{-- 댓글 div --}}
        <div id="comments">
            <h5>Comment</h5>
                
                @forelse ($comments as $comment)    
                   <div class="commentsContents{{ $comment->id }}">
                    <hr>
                        id :
                        {{ $comment->name }}
                        <br>
                        comment :
                        {{ $comment->comment }}
                        <br>
                        @if (isset(Auth::user()->name))
                            @if (Auth::user()->name == 'admin')
                                @csrf
                                    <button name="delete" onclick="btntest('{{ $comment->id }}')" class="btn btn-danger btn-sm" data-id="{{ $comment->id }}" >삭제</button>
                            @elseif(Auth::user()->name == $comment->name)
                                @csrf
                                    <button name="delete" onclick="btntest('{{ $comment->id }}')" class="btn btn-danger btn-sm" data-id="{{ $comment->id }}" >삭제</button>
                            @endif
                        @endif
                    <hr>
                   </div>
                @empty
                @endforelse
        </div>


        {{-- 댓글달기 div --}}
        <div>
            <hr>
                @include('view.comment',['id' => $question->id])
            <hr>
        </div>


        {{-- 질문 CRUD버튼 --}}
        <div class="comment_button">
            @guest
                <a class="btn btn-primary" href="{{ route('questions.index') }}">목록</a>        
            @endguest
            @auth
                @if (Auth::user()->name == 'admin')
                    <a class="btn btn-outline-primary pull-right" href="{{ route('questions.edit', $question->id ) }}">수정</a>

                    <form class="delete-form" action="{{  route('questions.destroy', $question->id ) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger pull-right" value="삭제"/>
                    </form>

                    <a class="btn btn-outline-primary" href="{{ route('questions.index') }}">목록</a>
                @elseif(Auth::user()->id == $question->user_id)
                <a class="btn btn-outline-primary pull-right" href="{{ route('questions.edit', $question->id ) }}">수정</a>

                <form class="delete-form" action="{{  route('questions.destroy', $question->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-outline-danger pull-right" value="삭제"/>
                </form>

                <a class="btn btn-outline-primary" href="{{ route('questions.index') }}">목록</a>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('questions.index') }}">목록</a>
                @endif                
            @endauth
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function btntest(id){
            if(confirm('글을 삭제합니다.')){
                $.ajax({        
                    type:'DELETE',
                    url:'/comments/'+id ,
                    dataType:"html",
                    contentType: false,
                    processData: false,
                }).then(function(data){
                    console.log(data);
                    $('.commentsContents'+id).remove();
                });
            }
        }
    </script>
@endsection