<!DOCTYPE html>
<html>
<head>
    <title>Semester In Japan</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <h1 align="center">현지학기제</h1>
    <br />
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    @if(isset(Auth::user()->name))
      @if(Auth::user()->name=='admin')
      <input type="hidden" name="user_id" id="user_id" value="admin" />
      @else
      <input type="hidden" name="user_id" id="user_id" value="guest" />
      @endif
    @else
      <input type="hidden" name="user_id" id="user_id" value="none" />
    @endif

    @if(isset(Auth::user()->name))
        @if(Auth::user()->name=='admin')
        <table id="japan_table" class="table table-bordered" style="width:50">
            <thead>
                <tr>
                    <th style="width:15%">Week</th>
                    <th style="width:15%">Destination</th>
                    <th>Title</th>
                    <th style="width:15%">Show</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        @else
        <table id="japan_table" class="table table-bordered" style="width:50">
            <thead>
                <tr>
                    <th style="width:15%">Week</th>
                    <th style="width:15%">Destination</th>
                    <th>Title</th>
                    <th style="width:15%">Show</th>

                </tr>
            </thead>
        </table>
        @endif
    @else
    <table id="japan_table" class="table table-bordered" style="width:50">
        <thead>
            <tr>
                <th style="width:15%">Week</th>
                <th style="width:15%">Destination</th>
                <th>Title</th>
                <th style="width:15%">Show</th>

            </tr>
        </thead>
    </table>
    @endif
</div>

<div id="japanModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="japan_form" enctype="multipart/form-data">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Week</label>
                        <input type="text" name="week" id="week" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Destination</label>
                        <input type="text" name="destination" id="destination" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" rows="10" id="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Image</label>
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="japan_id" id="japan_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
  if($('#user_id').val()=='admin'){
    $('#japan_table').DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": "{{ route('japan.getdata') }}",
       "columns":[
           { "data": "week" },
           { "data": "destination" },
           { "data": "title"},
           { "data": "show"},
           { "data": "action"},
       ]
    });
  }
  else if($('#user_id').val()=='guest'){
    $('#japan_table').DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": "{{ route('japan.getdata') }}",
       "columns":[
           { "data": "week" },
           { "data": "destination" },
           { "data": "title"},
           { "data": "show"},
       ]
    });
  }
  else if($('#user_id').val()=='none'){
    $('#japan_table').DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": "{{ route('japan.getdata') }}",
       "columns":[
           { "data": "week" },
           { "data": "destination" },
           { "data": "title"},
           { "data": "show"},
       ]
    });
  }



     $('#add_data').click(function(){
        $('#japanModal').modal('show');
        $('#japan_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Data');
    });

    $('#japan_form').on('submit', function(event){
        event.preventDefault();
        var form = $('#japan_form')[0];

        // Create an FormData object
        var data = new FormData(form);
        $.ajax({
            url:"{{ route('japan.postdata') }}",
            method:"POST",
            data:data,
            dataType:"json",
            contentType: false,
            processData: false,
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#japan_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                    $('#japan_table').DataTable().ajax.reload();
                }
            }
        });
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('japan.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#week').val(data.week);
                $('#destination').val(data.destination);
                $('#title').val(data.title);
                $('#content').val(data.content);
                $('#japan_id').val(id);
                $('#japanModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('update');
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('japan.removedata')}}",
                type:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#japan_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    });


});
</script>
</body>
</html
