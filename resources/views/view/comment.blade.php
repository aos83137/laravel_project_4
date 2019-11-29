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
                            var $div = $('<div class="commentsContents">id : {{ $comment->name }}<br>commnet : '+comment+'<br><button name="delete" class="btn btn-danger button__delete" data-id="{{ $comment->id }}" data-cnt="" >삭제</button>   <hr></div>');
                            $('#comments').append($div);
                        });
                    }else{
                        // error messag
                    }   
            });
        });
        $('.button__delete').on('click', function(e){

            var commentId = $(this).data('id');
            var questionId = {{ $question->id }};
            var index = $(this).data('cnt');
            $.ajax({        
                type:'DELETE',
                url:'/comments/'+commentId ,
                dataType:"html",
                success:function(data){
                }
            }).then(function(data){
                $('.commentsContents'+index).remove();
            });
            
        })
</script>
{{-- <form action="{{ route('comments.store',$id) }}" method="POST"> --}}
@csrf
<h3>댓글 달기</h3>
<input type="text" name="comment" class="form-control" id="comment" value="">

@auth
    <button class="btn btn-danger button__add">등록</button>
    {{-- <button name="delete" class="btn btn-danger button__delete" data-id="{{ $comment->id }}" >삭제</button> --}}

    {{-- <input type="submit" class="btn btn-danger" value="등록"/>   --}}
@endauth
@guest
    <p>로그인 해주세요</p>
@endguest

{!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
{{-- </form> --}}

