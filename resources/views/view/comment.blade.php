<form action="{{ route('comments.store',$id) }}" method="POST">
    @csrf
        <input type="content" name="comment" class="form-control">

        <input type="submit" class="btn btn-danger" value="등록"/>  
        {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
</form>
