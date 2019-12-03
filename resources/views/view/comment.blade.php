<script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
                $('.button__add').on('click', function(e){
                    comment = $('#comment').val();
                    if(comment!=''){
                        $.ajax({
                        url:"/comments/"+{{ $question->id }},
                        method:"POST",
                        data:{
                            comment:comment
                        },

                        }).then(function(data){
                            @auth
                            var $div = $('<div class="commentsContents'+10+'"><hr>id : {{ $user->name }}<br>comment : '+data.comment+' <br> <button name="delete" class="btn btn-danger button__delete btn-sm" data-id="10" data-cnt="" >삭제</button>   <hr></div>');
                            $('#comments').append($div);
                            @endauth
                        });
                    }else{
                        // error messag
                    }   
            });
        });

</script>
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


