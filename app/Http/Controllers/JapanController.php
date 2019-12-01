<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Japan;
use DataTables;
use Validator;
use Illuminate\Support\Str;

class JapanController extends Controller
{
  function index()
  {
   return view('japans.japan');
   //http://127.0.0:8000/ajaxdata
  }

  function getdata()
   {
    $japans = Japan::select('title', 'content','destination','week');
    return DataTables::of($japans)->make(true);
   }

   function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'content'  => 'required',
            'destination' => 'required',
            'week' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $image = $request->file("image");
                $filename = Str::random(15).filter_var($image->getClientOriginalName(),FILTER_SANITIZE_URL);
                $image->move(public_path('images'),$filename);


                $japan = new Japan([
                    'title'    =>  $request->get('title'),
                    'content'     =>  $request->get('content'),
                    'destination'     =>  $request->get('destination'),
                    'week'     =>  $request->get('week'),
                    'image'     =>  $filename,

                ]);
                $japan->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }



}
