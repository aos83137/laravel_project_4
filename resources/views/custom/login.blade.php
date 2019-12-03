<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .form-horizontal {
        margin-top: 50px;
      }
      body {
        background: #0579a2;
      }
      .yeah {
        padding: 5% 0 0;
      }


    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
            @if(session('status'))
                {{session('status')}}
            @endif
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif

                <form class="form-horizontal" action="{{route('custom.login')}}" method="post">
                {{csrf_field()}}
                    <fieldset>
                        <legend>로그인</legend>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">이메일</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="이메일">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="col-lg-4 control-label">비밀번호</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="비밀번호">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="yeah">
                                <button type="submit" class="btn btn-primary btn-block">로그인</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<script
  src="http://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <style>
    *{
      margin: 0;
      padding: 0;
      text-decoration: none;
      font-family: montserrat;
      box-sizing: border-box;
    }

    body{
      min-height: 100vh;
      /* background-image: linear-gradient(120deg,#3498db,#8e44ad); */
      background: linear-gradient(to bottom, #F5A9A9,#D8CEF6);
    }

    .login-form{
      width: 360px;
      background: #f1f1f1;
      height: 580px;
      padding: 80px 40px;
      border-radius: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
    }

    .login-form h1{
      text-align: center;
      margin-bottom: 60px;
    }

    .txtb{
      border-bottom: 2px solid #adadad;
      position: relative;
      margin: 30px 0;
    }

    .txtb input{
      font-size: 15px;
      color: #333;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      height: 40px;
    }

    .txtb span::before{
      content: attr(data-placeholder);
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      z-index: -1;
      transition: .5s;
    }

    .txtb span::after{
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      background: linear-gradient(120deg,#3498db,#8e44ad);
      transition: .5s;
    }

    .focus + span::before{
      top: -5px;
    }
    .focus + span::after{
      width: 100%;
    }

    .logbtn{
      display: block;
      width: 100%;
      height: 50px;
      border: none;
      background: linear-gradient(120deg,#3498db,#8e44ad,#3498db);
      background-size: 200%;
      color: #fff;
      outline: none;
      cursor: pointer;
      transition: .5s;
    }

    .logbtn:hover{
      background-position: right;
    }

    .bottom-text{
      margin-top: 60px;
      text-align: center;
      font-size: 13px;
    }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <h1> Team 2 </h1>
          <form action="{{ route('custom.login') }}" class="login-form">
            <h1>로그인</h1>

            <div class="txtb">
              <input type="text" class="form-control" name="email" value="{{old('email')}}">
              <span data-placeholder="이메일"></span>
            </div>

            <div class="txtb">
              <input type="password">
              <span data-placeholder="비밀번호"></span>
            </div>

            <input type="submit" class="logbtn" value="로그인">

            <div class="bottom-text">
              계정이 없으신가요? <a href="{{ route('custom.register') }}">회원가입</a>
            </div>

          </form>

          <script type="text/javascript">
          $(".txtb input").on("focus",function(){
            $(this).addClass("focus");
          });

          $(".txtb input").on("blur",function(){
            if($(this).val() == "")
            $(this).removeClass("focus");
          });

          </script>


  </body>
</html>
