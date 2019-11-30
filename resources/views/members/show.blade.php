@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h4>이름<small>/{{$member->name}}</small></h4>
    </div>

    <article>
        @include('attachments.partial.list', ['attachments'=>$member->attachments])
        <p>{{ $member->body }}</p>
  

        
    
    </article>

    <div class="text-center action__article">
        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-info">
            <i class="fa fa-pencil"></i> 조원 수정
        </a>

        <button class="btn btn-danger button__delete">
            <i class="fa fa-trash-o"></i> 조원 삭제
        </button>
        
        <a href="{{ route('members.index') }}" class="btn btn-default">
            <i class="fa fa-list"></i> 조원 목록
        </a>
    </div>

@stop

@section('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        $(document).ready(function(){
            $(document).on('click','.button__delete', function(e){
                var memberId = '{{ $member->id }}';

                if (confirm('조원을 삭제합니다.')){
                    $.ajax({
                        type:'DELETE',
                        url:'/members/' + memberId
                    }).then(function(){
                        window.location.href='/members';
                    });
                }
            });          
        });
    </script>
@stop


