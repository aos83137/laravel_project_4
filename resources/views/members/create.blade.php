@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>새글 쓰기</h1>
        <hr />
        <!-- css: bootstrap4.3.1사용, ch9에서 php artisan ui:vue --auth npm i, npm run dev -->
        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!} 
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">이름</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"/>
                {!! $errors->first('name','<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                <label for="body">조원 소개</label>
                <textarea name="body" id="body" rows="10" class="form-control">{{ old('body')}}</textarea>
                {!! $errors->first('body','<span class="form-error">:message</span>') !!}
            </div>


            <div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
                <label for="files">조원사진</label>
                <input type="file" name="files[]" id="files" class="form-control" multiple="multiple" />
                {!! $errors->first('files.0','<span class="form-error">:message</span>') !!}
            </div>
 
         
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    저장하기
                </button>
            </div>
        </form>
    </div>
    
@stop


