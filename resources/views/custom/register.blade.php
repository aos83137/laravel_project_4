<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
</style>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">

                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif

                <form class="form-horizontal" action="{{route('custom.register')}}" method="post">
                {{csrf_field()}}
                    <fieldset>
                        <legend align="center">회원가입</legend>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">이름</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="이름">
                            </div>
                        </div>

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
                            <label for="exampleInputPassword1" class="col-lg-4 control-label">비밀번호 확인</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="비밀번호">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-8 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">가입</button>
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
</html>