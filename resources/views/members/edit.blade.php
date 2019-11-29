@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h4>조원 <small> / 수정 / {{ $member->name}}</small></h4>
    </div>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        
        @include('members.partial.form')
        <div class="form-group"><button class="btn btn-danger">수정하기</button></div>
    </form>
@stop