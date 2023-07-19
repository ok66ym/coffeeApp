<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeePost;  //CoffeePostモデル使用のためのuse宣言
use App\Http\Requests\CoffeePostRequest;
use Illuminate\Support\Facades\Auth;

class CoffeePostController extends Controller
{
    // 投稿マイページ
    public function index(CoffeePost $post) {
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql();    //確認用に追加
        // dd($test);  //確認用に追加
        return view('posts.index')->with(['posts' => $post->getPaginateBylimit()]); //fetPaginateBylimit()：CoffeePost.phpで定義したメソッド．
    }
    
    // 投稿作成
    public function create() {
        return view('posts.create');
    }
    
    // 投稿保存
    public function store(CoffeePostRequest $request, CoffeePost $post) {
        // dd(Auth::user()->posts());  //投稿者のデータのみを表示
        $input = $request['post'];  //['post']：ビューファイル上でのpost[bitter]などのリクエストパラメータを取得する．
        $input['user_id'] = Auth::id();     //投稿者のuser_idをデータベースに渡す
        $post->fill($input)->save();    //保存処理
        return redirect('/posts/' . $post->id);
    }
    
    public function show(CoffeePost $post) {
        return view('posts.show')->with(['post' => $post]);
    }
}
