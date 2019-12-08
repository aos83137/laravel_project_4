@extends('layouts.app_reg')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        font-family: '메이플스토리', sans-serif;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        /* background-image: linear-gradient(120deg,#3498db,#8e44ad); */
        background: linear-gradient(to bottom, #F5A9A9, #D8CEF6);
    }

    .login-form {
        width: 360px;
        background: #f1f1f1;
        height: 650px;
        padding: 80px 40px;
        border-radius: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .login-form h1 {
        text-align: center;
        margin-bottom: 60px;
    }

    .txtb {
        border-bottom: 2px solid #adadad;
        position: relative;
        margin: 30px 0;
    }

    .txtb input {
        font-size: 15px;
        color: #333;
        border: none;
        width: 100%;
        outline: none;
        background: none;
        padding: 0 5px;
        height: 40px;
    }

    .txtb span::before {
        content: attr(data-placeholder);
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        z-index: -1;
        transition: .5s;
    }

    .txtb span::after {
        content: '';
        position: absolute;
        right: 0px;
        top: 39.7px;
        width: 0%;
        height: 2px;
        background: linear-gradient(120deg, #3498db, #8e44ad);
        transition: .5s;
    }

    .focus+span::before {
        top: -5px;
    }

    .focus+span::after {
        width: 100%;
    }

    .logbtn {
        display: block;
        width: 100%;
        height: 50px;
        border: none;
        background: linear-gradient(120deg, #3498db, #8e44ad, #3498db);
        background-size: 200%;
        color: #fff;
        outline: none;
        cursor: pointer;
        transition: .5s;
    }

    .logbtn:hover {
        background-position: right;
    }

    .bottom-text {
        margin-top: 40px;
        text-align: center;
        font-size: 13px;
    }

</style>
@if(count($errors) > 0)
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{$error}}</p>
@endforeach
@endif
<!-- <form action="{{ route('custom.login') }}" class="login-form" method="post"> -->
<form action="{{ route('custom.register') }}" class="login-form" method="post">
    {{csrf_field()}}
    <h1>회원가입</h1>
    <div class="txtb">
        <input type="text" class="form-control" name="email">
        <span data-placeholder="이름"></span>
    </div>
    <div class="txtb">
        <input type="text" class="form-control" name="email">
        <span data-placeholder="이메일"></span>
    </div>

    <div class="txtb">
        <input type="password" class="form-control" name="password">
        <span data-placeholder="비밀번호"></span>
    </div>

    <div class="txtb">
        <input type="password" class="form-control" name="password">
        <span data-placeholder="비밀번호"></span>
    </div>

    <input type="submit" class="logbtn" value="회원가입">

    <div class="bottom-text">
        계정이 있으신가요? <a href="{{ route('custom.login') }}">로그인</a></br></br>
        비밀번호를 잊어버렸다면? <a href="{{ route('remind.create') }}">비밀번호 찾기</a>
    </div>

</form>

<script type="text/javascript">
    $(".txtb input").on("focus", function () {
        $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function () {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });

</script>
@stop
