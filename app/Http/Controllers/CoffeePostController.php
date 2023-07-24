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
        
        $userId = Auth::id();                                       // ログイン済みのユーザーのIDを取得
        $posts = CoffeePost::where('user_id', $userId)->get();      // ユーザーが投稿した内容の一覧を取得

        // CoffeePostモデルのgetPaginateBylimitメソッドを呼び出してページネーションの結果を取得
        $posts = $post->getPaginateBylimit($userId); 
        
        return view('posts.index')->with(['posts' => $posts]);
        
        //return view('posts.index')->with(['posts' => $post->getPaginateBylimit()]); //getPaginateBylimit()：CoffeePost.phpで定義したメソッド．
    }
    
    // 投稿作成
    public function create() {
        return view('posts.create');
    }
    
    // 投稿保存
    public function store(CoffeePostRequest $request, CoffeePost $post) {
        // dd(Auth::user()->posts());  //投稿者のデータのみを表示
        $input = $request['post'];                          //['post']：ビューファイル上でのpost[bitter]などのリクエストパラメータを取得する．
        $input += ['user_id' => $request->user()->id];      //投稿に紐付いたuser_idを取得し，変数inputに入れる．
        $post->fill($input)->save();                        //保存処理
        return redirect('/posts/' . $post->id);
    }
    
    //投稿詳細
    public function show(CoffeePost $post) {
        return view('posts.show')->with(['post' => $post]);
    }
    
    //投稿編集
    public function edit(CoffeePost $post) {
        return view("posts.edit")->with(['post' => $post]);
    }
    
    //投稿編集実行
    public function update(CoffeePostRequest $request, CoffeePost $post) {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    //投稿削除
    //論理削除で実装
    public function delete(CoffeePost $post) {
        $post->delete();
        return redirect('/');
    }
}
