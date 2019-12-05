<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {

        $members=Member::all();
        return response()->json($members);
    }

    public function create()
    {
        return view('members.memberdata');
    }

    public function shows($id)
    {
        $member = Member::find($id);
        return response()->json($member);
    }

    public function store(Request $request)
    {

        $img = $request->file("files");
        $filename = Str::random(15).filter_var($img->getClientOriginalName(),FILTER_SANITIZE_URL);
        $img -> move(public_path('files'), $filename);
        
        
        $member = new Member([
            'name'=> $request->get('name'),
            'body'=>$request->get('body'),
            'img'=>$filename,
        ]);
        
        $member->save();
        return response()->json($member);
     
    }
    
    public function edit($id)
    {
        $member = Member::find($id);
        return response()->json($member);
    }

    public function update(Request $request, $id)
    {

        $img = $request->file("files");
        $filename = Str::random(15).filter_var($img->getClientOriginalName(),FILTER_SANITIZE_URL);
        $img -> move(public_path('files'), $filename);

    
        $member = Member::find($id)->update([
            'name'=>$request->name,
            'body'=>$request->body,
            'img'=>$filename,
        ]);
        
        return response()->json($member);
    }

    public function destroy($id)
    {
        Member::find($id)->delete();
        return response()->json(['done']);
    }


}
