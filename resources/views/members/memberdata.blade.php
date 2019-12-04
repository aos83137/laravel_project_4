@extends('layouts.app')

@section('content')
    <div class="container">

        <button type="button" id="create" onclick="create()" class="btn btn-primary" style="width:100px;">조원추가</button>

        <div class="row">
            <div class="col-nd-8">
                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>이름</th>   
                            <th>조원소개</th>  
                            <th>수정</th>
                            <th>삭제</th>
                        </tr>
                    </thead>
                    <tbody id="list"></tbody>
                </table>
            </div>
            <div calss="col-nd-4">
                <form id="createform" enctype="multipart/form-data">
                    <div class="form-group myid">
                        <label>id</label>
                        <input type="number" id="id" name="id" class="form-control" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="name">이름</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="이름">        
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
        </div>
    </div>

@stop

@section('script')
    <script type="text/javascript">
        $('#createform').hide();
        $('#save').show();
        $('#update').hide();
        $('.myid').hide();

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function create(){
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
                        str += '<td>' + value.name + '</td><td>' + value.body +'</td>';
                        str += '<td>';
                        str += "<button type='button' class='btn btn-warning' onclick='editData("+value.id+")'>수정</button>" +'</td>';
                        str += '<td>';
                        str += "<button type='button' class='btn btn-danger' onclick='deleteData("+value.id+")'>삭제</button>";
                        str += '</td></tr>';
                    });
                    $("#list").html(str);
                },
                error : function(){
                    alert("error");
                }
            });
        }
        viewData();

        function saveData(){

            var form = $('#createform')[0];
            var data = new FormData(form);
    
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
                }
            });
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
            console.log('ee');
            var id = $('#id').val();
     
            var form = $('#createform')[0];
            var data = new FormData(form);
            console.log(id);
            console.log(form);
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
                }
            });

        }

        function deleteData(id){
            $.ajax({
                type: "DELETE",
                dataType: "json",
                url: '/members/' + id,
                success: function(response){
                    viewData();
                }
            });
        }


    </script>
@stop

