@extends('layouts.app')

@section('content')
    <div class="container">
        <form action='members/create' method='get'>
            <button>조원추가</button>
        </form>
    
        @forelse($member as $members)
            <a href="{{route('members.show', $members->id)}}">
                <h1>{{$members->name}}</h1>
            </a>

            <button class="btn btn-danger delete" onclick="button__delete('{{$members->id}}')">
                <i class="fa fa-trash-o"></i> 조원 삭제
            </button>
            
        @empty
            <p>조원이 없습니다.</p>
        @endforelse
    </div>
    
    @if($member->count())
        <div class="text-center">
            {!! $member -> render() !!}
        </div>
    @endif
@stop



@section('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function button__delete(id){
            if(confirm('조원을 삭제합니다.')){
                $.ajax({
                    type:"DELETE",
                    url: '/members/' +id
                }).then(function(e){
                    window.location.href='/members';
                });
            }
        };
    </script>
@stop
            




