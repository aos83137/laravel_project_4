<script>
        $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.button__add').on('click', function(e){
                    comment = $('#comment').val();
                    if(comment!=''){
                        $.ajax({
                        url:"/comments/"+{{ $question->id }},
                        method:"POST",
                        data:{
                            // input태그 내용을  CommentsController로 보냄
                            comment:comment
                        },

                        }).then(function(data){
                            @auth
                            var $div = $('<div class="commentsContents'+data.comments.id+'"><hr>id : {{ $user->name }}<br>comment : '+data.comments.comment+' <br> <button onclick="btntest('+data.comments.id+')" name="delete" class="btn btn-danger button__delete btn-sm">삭제</button>   <hr></div>');
                            $('#comments').append($div);
                            @endauth
                            $('#comment').val('');
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
</div>
@endauth
@guest
    <p>로그인 해주세요</p>
@endguest


