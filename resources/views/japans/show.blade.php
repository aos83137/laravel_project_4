<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
</head>
<style>
body, html{
  background-color:skyblue;
  background: repeating-linear-gradient(45deg, white 50%,skyblue 30%,);
  font-family: 'Nunito', sans-serif;
}
@keyframes slidein {
                0%, 100%{transform:translate(0,0)}
                50%{transform:translate(0,-20px)}
            }
            @-webkit-keyframes bounce{
              0%, 100%{transform:translate(0,0)}
              50%{transform:translate(0,-20px)}
            }
          }
.jumbotron{
  text-align:center;
  /* border: 1px solid brown; */
  animation-name: slidein;
  animation-duration:2s;
  animation-iteration-count:infinite;
  animation-direction:normal;
  animation-timing-function: ease-in-out;
  animation-fill-mode: both;
  animation-delay: 1s;
}
.container{
  text-align:center;
}
.text{
  text-align:left;
  /* margin-left:30px; */
  margin-top:70px;
}
</style>
<body>
<div class="container">
    <br />
    <h2>it is for u</h2>
    <br />
    <div class="jumbotron">
      <img src="{{URL::to('/')}}/images/{{$data->image}}" alt="">
    </div>
    <div class="text">
      <h3>week - {{$data->week}}</h3>
      <hr>
      <h3>destination- {{$data->destination}}</h3>
      <hr>
      <h3>title- {{$data->title}}</h3>
      <hr>
      <h3>content- {{$data->content}}</h3>
      <hr>
    </div>
</div>
</body>
</html>