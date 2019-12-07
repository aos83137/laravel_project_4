@extends('layouts.app')

@section('content')
  <form action="{{ route('reset.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="page-header">
      <h1>변경할 이메일과 새 비밀번호를 입력하시오</h1>
    </div>

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="{{ trans('이메일') }}" value="{{ old('email') }}" autofocus>
      {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
    </div>

    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="{{ trans('새 비밀번호') }}">
      {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
    </div>

    <div class="form-group">
      <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('비밀번호 확인') }}">
      {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit">
      {{ trans('확인') }}
    </button>
  </form>
@stop