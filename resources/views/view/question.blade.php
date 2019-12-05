@extends('layouts.app')

@section('content')
<style>
    .delete-form{
        display: inline;
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
            <h1>Q&A</h1>
            <hr>
            <h1>
                질문 : {{ $question->title }}
            </h1>
            <small>질문자 : {{ $question->user->name }}</small>
            <p>{{ $question->content }}</p>
            <hr>
        </div>
        


        {{-- 댓글 div --}}
        <div id="comments">
            <h3>Comment</h3>
                
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
<<<<<<< Updated upstream
                                    <button name="delete" class="btn btn-danger button__delete btn-sm" data-id="{{ $comment->id }}">삭제</button>
                            @elseif(Auth::user()->name == $comment->name)
                                @csrf
                                    <button name="delete" class="btn btn-danger button__delete btn-sm" data-id="{{ $comment->id }}">삭제</button>
=======
                                    <button name="delete" onclick="btntest('{{ $comment->id }}')" class="btn btn-danger btn-sm" data-id="{{ $comment->id }}" >삭제</button>
                            @elseif(Auth::user()->name == $comment->name)
                                @csrf
                                    <button name="delete" onclick="btntest('{{ $comment->id }}')" class="btn btn-danger btn-sm" data-id="{{ $comment->id }}" >삭제</button>
>>>>>>> Stashed changes
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
                {{-- @include('view.comment',['id' => $question->id]) --}}
                
                @csrf
                <h3>댓글 달기</h3>
                <input type="text" name="comment" class="form-control" id="comment" value="">
                
                @auth
                <div>
                    <button class="btn btn-danger button__add">등록</button>
                    {{-- <button name="delete" class="btn btn-danger button__delete" data-id="{{ $comment->id }}" >삭제</button> --}}
                
                    {{-- <input type="submit" class="btn btn-danger" value="등록"/>   --}}
                </div>
                @endauth
                @guest
                    <p>로그인 해주세요</p>
                @endguest
                
                {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
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

                    <form class="xxxx" action="{{  route('questions.destroy', $question->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-ouline-danger " value="삭제"/>
                    </form>

                    <a class="btn btn-outline-primary" href="{{ route('questions.index') }}">목록</a>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('questions.index') }}">목록</a>
                @endif                
            @endauth
        </div>
    </div>
@endsection
<<<<<<< Updated upstream

@section('script')
    <script>
            $(document).ready(function() {
                $('.button__delete').on('click', function(e){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    if(confirm('글을 삭제합니다.')){
                        var commentId = $(this).data('id');
                        var questionId = {{ $question->id }};
                        var index = $(this).data('cnt');
                        $.ajax({        
                            type:'DELETE',
                            url:'/comments/'+commentId ,
                            dataType:"html",
                            contentType: false,
                            processData: false,
                        }).then(function(data){
                            $('.commentsContents'+commentId).remove();
                        }).catch();
                    }            
                })
                $('.button__add').on('click', function(e){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    }); 
                    comment = $('#comment').val();

                    if(comment!=''){
                        $.ajax({
                        url:"/comments/"+{{ $question->id }},
                        method:"POST",
                        data:{
                            comment:comment
                        },

                        }).then(function(response){
                            var $div = $('<div class="commentsContents'+response.id+'"><hr>id : {{ $user->name }}<br>comment : '+comment+' <br> <button name="delete" class="btn btn-danger button__delete btn-sm" data-id="{{ $comment->id }}">삭제</button>   <hr></div>');
                            $('#comments').append($div);
                        }).catch();
                    }else{
                        // error messag
                    }   
            });
        });

    </script>
@stop

=======
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
                    $('.commentsContents'+id).remove();
                });
            }
        }
    </script>
@endsection
>>>>>>> Stashed changes
