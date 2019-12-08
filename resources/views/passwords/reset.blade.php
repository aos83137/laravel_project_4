@extends('layouts.app')

@section('content')
<style>
html body{
  min-height: 100vh;
      /* background-image: linear-gradient(120deg,#3498db,#8e44ad); */
      background: linear-gradient(to bottom, #F5A9A9,#D8CEF6);
      font-family: '메이플스토리', sans-serif;
}
.body_t{
  width: 400px;
      background: #f1f1f1;
      height: 400px;
      padding: 80px 40px;
      border-radius: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      text-align:center;
}
.cbtn{
  display: block;
      width: 100%;
      height: 40px;
      border: none;
      border-radius: 3px;
      background: linear-gradient(120deg,#3498db,#8e44ad,#3498db);
      background-size: 200%;
      color: #fff;
      outline: none;
      cursor: pointer;
      transition: .5s;
      margin-top:25px;
}
.cbtn:hover{
      background-position: right;
    }
.page-header{
  font-family: '메이플스토리', sans-serif;
}
</style>
  <form action="{{ route('reset.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}

    <input type="hidden" name="token" value="{{ $token }}">
    <div class="body_t">
    <div class="page-header">
      <p>변경할 이메일과 새 비밀번호를 입력하시요.</p>
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

    <button class="cbtn" type="submit">
      {{ trans('확인') }}
    </button>
    </div>
  </form>
@stop