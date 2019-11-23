<form action="{{ route('comments.store',$id) }}" method="POST">
    @csrf
        <h3>댓글 달기</h3>
        <input type="content" name="comment" class="form-control">

        @auth
            <input type="submit" class="btn btn-danger" value="등록"/>  
        @endauth
        @guest
            <p>로그인 해주세요</p>
        @endguest
      
        {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
</form>
