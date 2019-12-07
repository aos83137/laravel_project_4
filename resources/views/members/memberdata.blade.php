@extends('layouts.app')
@section('content')
<style>

</style>
    <div class="container">


        @if (isset(Auth::user()->name))
            @if (Auth::user()->name == 'admin')
                @csrf

                    <button type="button" id="create" onclick="create()" class="btn btn-primary" style="width:100px;">조원추가</button>

                   
                        <div class="col-nd-8">
                            <table class="table table-dark table-hover table-bordered" id="tableid">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>이름</th>   
                                        <th>조원소개</th>  
                                        <th>수정</th>
                                        <th>삭제</th>
                                    </tr>
                                </thead>
                                <tbody id="list"></tbody>
                            </table>
                        </div>
            @elseif (Auth::user()->name != 'admin')
                @csrf
                    <div id="guest"></div>
            @endif
        @endif
        <div calss="col-nd-4">
            <div class="alert alert-danger false" style="display: none">
                내용을 다 입력해주세요.
            </div>
            <div class="alert alert-primary true" style="display: none">
                저장되었습니다.
            </div>
            <form id="createform" enctype="multipart/form-data">
                <div class="form-group myid">
                    <label>id</label>
                    <input type="number" id="id" name="id" class="form-control" readonly="readonly">
                    
                </div>
                <div class="form-group">
                    <label for="name">이름</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="이름" >        
            
                </div>

                <div class="form-group">
                    <label for="body">조원소개</label>
                    <textarea name="body" id="body" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="file">조원사진</label>
                    <input type="file" name=files class="form-control" id="file">
                </div> 


                <button type="button" id="save" onclick="saveData()" class="btn btn-primary" style="width:80px;">저장</button>
                <button type="button" id="update" onclick="updateData()" class="btn btn-warning" style="width:80px;">수정</button>               
            </form>
        </div>
        <div id="show"></div> 
        @guest
        <h2>로그인해주세요</h2>
        @endguest
    </div>
     
@stop

@section('script')
    <script type="text/javascript">

        $('#createform').hide();
        $('#save').show();
        $('#update').hide();
        $('.myid').hide();
        $('#show').show();

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    

        function create(){
            $('#show').hide();
            $('#createform').show();
          
            
        }

        function viewData(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/members',
                success: function(response){
                    var str = '<tr>';
                    $.each(response, function(key,value){
                        str += '<td class="clickable">' + value.id + '</td>';
                        str += '<td>' + value.name + '</td><td>' + value.body +'</td>';
                        str += '<td>';
                        str += "<button type='button' class='btn btn-warning' onclick='editData("+value.id+")'>수정</button>" +'</td>';
                        str += '<td>';
                        str += "<button type='button' class='btn btn-danger' onclick='deleteData("+value.id+")'>삭제</button>";
                        str += '</td></tr>';
                    });
                    $("#list").html(str);
                    $('.true').hide();
                    $('.false').hide();
                },
                error : function(){
                    alert("error");
                }
            });
        }
        viewData();

        $(document).on("click",".clickable", function(){
            $('#show').show();
            var id = $(this).text();

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/members/'+id+'/shows' ,
                success: function(response){
                    var str = '<img src="files/'+response.img+'" width="350" height="250">';
                    str += '<h4>';
                    str += '이름</br>' + response.name+'</h4>';
                    str += '</br><h4>조원소개</br>' + response.body+'</h4>';
                    
                    $("#show").html(str);
                },
                error : function(){
                    alert("error");
                }
            });
            
            
        })

        function saveData(){

            var form = $('#createform')[0];
            var data = new FormData(form);
            $('#show').hide();
           
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: data,
                contentType: false,
                processData: false,
                url: '/members',
                success: function(response){
                    viewData();
                    clearData();
                    $('#save').show();
                    $('#createform').hide();
                    $('.true').show();
                    $('.false').hide();
                }
            }).fail(function(response){
                $('.false').show();
                
            })
        }



        function clearData(){
            $('#name').val('');
            $('#body').val('');
            $('#file').val('');

        }

        function editData(id){
            $('#createform').show();
            $('#save').hide();
            $('#update').show();
            $('.myid').show();
            $('#show').hide();


            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/members/"+id+"/edit",
                success: function(response){
                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#body').val(response.body);
            
                }
            });
    
        }

        function updateData(){
            var id = $('#id').val();
     
            var form = $('#createform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                dataType: "json",
                data: data ,
                url: '/members/'+ id,
                contentType: false,
                processData: false,
                success: function(response){
                    viewData();
                    clearData();
                    $('#save').show();
                    $('#update').hide();
                    $('.myid').hide();
                    $('#createform').hide();
                    $('.true').show();
                    $('.false').hide();
             
                   
                }
            }).fail(function(response){
                $('.false').show();
                
            })

        }

        function deleteData(id){
            $.ajax({
                type: "DELETE",
                dataType: "json",
                url: '/members/' + id,
                success: function(response){
                    viewData();
                    $('.true').show();
                }
            });
        }

        function guest(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/members' ,
                success: function(response){
                    var str = '<div>';
                    $.each(response, function(key,value){
                        str += '<img src="files/'+value.img+'" width="350" height="250">';
                        str += '<h4>';
                        str += '이름</br>' + value.name+'</h4>';
                        str += '</br><h4>조원소개</br>' + value.body+'</h4>';
                        str += '<hr/>'
                        str += '</div>';          
                    });
                    $("#guest").append(str);
                },
                error : function(){
                    alert("error");
                }
            });
        }
        guest();

    </script>
@stop

