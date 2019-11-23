<form action="{{ route('comments.store',$id) }}" method="POST">
    @csrf
        <input type="content" name="comment">

        <input type="submit" class="btn btn-danger" value="등록"/>  
        {{-- <button type="submit" >등록</button> --}}
</form>
