<form action="{{ route('comments.store',$id) }}" method="POST">
    @csrf
        <h3>댓글 달기</h3>
        <input type="content" name="comment" class="form-control">


        @if(isset(Auth::user()->name))
            @if (Auth::user()->name == 'admin')
                <input type="submit" class="btn btn-danger" value="등록"/>  
            @endif
        @else
            <p>로그인 해주세요</p>
        @endif
      
        {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
</form>
