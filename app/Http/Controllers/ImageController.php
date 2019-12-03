<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {
      return view('image');
    }

    public function save(Request $request) {
      request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if($files = $request->file('image')) {
        $image = $request->image->store('public/images'); // 사진(파일) 업로드

        return Response()->json([
          "success" => true,
          "image" => $image
        ]);
      }

      return Response()->json([
        "success" => false,
        "image" => ''
      ]);
    }
}
