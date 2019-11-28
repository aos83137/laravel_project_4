<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = \App\Member::paginate(3);
        return view('members.index',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\MembersRequest $request)
    {

        $member=\App\Member::create($request->all());

        if(!$member){
            return back()->with('flash_message','글작성 실패')->withInput();
        }

        if ($request->hasFile('files')){
            $files = $request->file('files');

            foreach ($files as $file){
                $filename = filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                
                $member->attachments()->create([
                    'filename'=>$filename,
                    'bytes'=>$file->getSize(),
                    'mime'=>$file->getClientMimeType()
                ]);

                $file->move(attachments_path(), $filename);
            }
        }
        return redirect(route('members.index'))->with('flash_message','글작성 성공');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Member $member)
    {
        
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Member $member)
    {   
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\MembersRequest $request, \App\Member $member)
    {
        $member->update($request->all());

        return redirect(route('members.show', $member->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Member $member)
    {
        $member->delete();

        return response()->json([], 204);
    }
}
