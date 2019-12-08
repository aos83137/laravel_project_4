@extends('layouts.app_re')

@section('content')
<style>
html body{
    min-height: 100vh;
      /* background-image: linear-gradient(120deg,#3498db,#8e44ad); */
      background: linear-gradient(to bottom, #F5A9A9,#D8CEF6);
      font-family: '메이플스토리', sans-serif;
}
  .body_div{
      width: 400px;
      background: #f1f1f1;
      height: 250px;
      padding: 80px 40px;
      border-radius: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      text-align:center;
  }

}
  /* .page-header.{
    margin-bottom:50px;
    font-size:10px;
    text-decoration: none;
    font-family: sans-serif;
    
} */
.form-control{
  display:inline-block;
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
</style>
  <form action="{{ route('remind.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}
    <div class="body_div">
    <!-- <div class="page-header">
        <p>이메일을 입력해 주세요.</p>
    </div> -->

    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="{{ trans('이메일') }}" value="{{ old('email') }}" autofocus>
      {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
    </div>

    <button class="cbtn" type="submit">
      {{ trans('확인') }}
    </button>
    </div>
  </form>
@stop