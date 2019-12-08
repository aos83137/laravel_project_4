<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
</head>
<style>
body, html{
  /* background-color:#A9E2F3; */
  background: linear-gradient(to right, #F5F6CE,#58FAD0);
  font-family: '메이플스토리', sans-serif;
}
/* @keyframes slidein {
                0%, 100%{transform:translate(0,0)}
                50%{transform:translate(0,-20px)}
            }
            @-webkit-keyframes bounce{
              0%, 100%{transform:translate(0,0)}
              50%{transform:translate(0,-20px)}
            }
          } */
.jumbotron{
  text-align:center;
  /* border:1px solid; 
  padding:10px; */
  /* border: 1px solid brown; */
  /* animation-name: slidein;
  animation-duration:2s;
  animation-iteration-count:infinite;
  animation-direction:normal;
  animation-timing-function: ease-in-out;
  animation-fill-mode: both;
  animation-delay: 1s; */
}
.container{
  text-align:center;
}
.text{
  text-align:left;
  margin-left:30px;
  margin-top:50px;
  font-family: '메이플스토리', sans-serif;
}
h1:after{
  content: "";
  display: block;
  width: 320px;
  border-bottom: 1px solid #A4A4A4;
  margin-left:610px;
  padding-top:10px;
}
h2:after{
  content: "";
  display: block;
  width: 1450px;
  border-bottom: 1px solid #A4A4A4;
  padding-top:10px;
}
.text1{
  border:1px solid bottom; 
  /* margin-left:30px; */
}
.text2{
  border:1px solid bottom; 
  
}
.text3{
  border:1px solid bottom; 
  
}
.text4{
  border:1px solid bottom; 
 
}
</style>
<body>
<div class="container">
    <br />
    <h1 style=color:#F7819F >현지학기제</h1>
    <br />
    <div class="jumbotron">
      <img src="{{URL::to('/')}}/images/{{$data->image}}" alt="">
      
    </div>
    <div class="text">
    <div class="text1">
      <h2>Week : {{$data->week}}</h2>
    </div>
    <div class="text2">
      <h2>Destination : {{$data->destination}}</h2>
    </div>
    <div class="text3">
      <h2>Title : {{$data->title}}</h2>
    </div>
    <div class="text4">
    <h2>Content : {{$data->content}}</h2>
    </div>
    </div>
</div>
</body>
</html>