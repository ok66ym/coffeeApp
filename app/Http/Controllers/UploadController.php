<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeePost;

class UploadController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    // public function create(Request $request)
    // {
    //     return view('posts.create');
    // }

    public function store(Request $request)
    {
        $file_name = $request->file('file')->getClientOriginalName();

        $request->file('file')->storeAs('public',$file_name);

        //複数ファイルをアップロード        
        // foreach($files as $file){

        // 	$file_name = $file->getClientOriginalName();
        
        // 	$file->storeAS('',$file_name);

        // }
    }
}
