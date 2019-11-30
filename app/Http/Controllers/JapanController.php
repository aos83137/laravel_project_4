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
    $japans = Japan::select('id','title', 'content','destination','week');
    return DataTables::of($japans)
        ->addColumn('action', function($japan){
                      return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$japan->id.'"> Edit</a>
                      <a href="#" class="btn btn-xs btn-danger delete" id="'.$japan->id.'"> Delete</a>';
                    })->addColumn('show', function($japan){
                      return '<a href="'.route('japan.show',$japan->id).'"> Show</a>';
                      })->rawColumns(['action','show'])
                      ->make(true);
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

          $image = $request->file("image");
          $filename = Str::random(15).filter_var($image->getClientOriginalName(),FILTER_SANITIZE_URL);
          $image->move(public_path('images'),$filename);

            if($request->get('button_action') == "insert")
            {



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

            if($request->get('button_action') == 'update')
            {
                $japan = Japan::find($request->get('japan_id'));
                $japan->week = $request->get('week');
                $japan->destination = $request->get('destination');
                $japan->title = $request->get('title');
                $japan->image = $filename;
                $japan->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request)
   {
       $id = $request->input('id');
       $japan = Japan::find($id);
       $output = array(
           'week' =>  $japan->week,
           'destination'  =>  $japan->destination,
           'title' => $japan->title,
           'content' => $japan->content,
           'image' => $japan->image,
       );
       echo json_encode($output);
   }

   function removedata(Request $request)
   {
       $japan = Japan::find($request->input('id'));
       if($japan->delete())
       {
           echo 'Data Deleted';
       }
   }

   public function show($id)
    {
      $data = Japan::findOrFail($id);
      return view('japans.show',compact('data'));
    }


}
