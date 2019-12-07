@extends('layouts.app')

@section('content')
  <form action="{{ route('remind.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}

    <div class="page-header">
        <h1>비밀번호 변경을 위해 이메일을 입력 후 버튼을 눌러주세요</h1>
    </div>

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="{{ trans('이메일') }}" value="{{ old('email') }}" autofocus>
      {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit">
      {{ trans('확인') }}
    </button>
  </form>
@stop