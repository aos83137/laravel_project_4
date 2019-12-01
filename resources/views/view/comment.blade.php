<script>
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
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
                            var $div = $('<div class="commentsContents'+10+'"><hr>id : {{ $user->name }}<br>comment : '+data.comment+' <br> <button name="delete" class="btn btn-danger button__delete btn-sm" data-id="10" data-cnt="" >삭제</button>   <hr></div>');
                            $('#comments').append($div);
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
    <button class="btn btn-outline-primary button__add ">등록</button>
@endauth
@guest
    <p>로그인 해주세요</p>
@endguest

{!! $errors->first('comment', '<span class="form-error">:message</span>') !!}

