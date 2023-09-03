<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeePost;                  //CoffeePostモデル使用のためのuse宣言
use App\Http\Requests\CoffeePostRequest;
use App\Models\LikeCoffeePost;
use App\Models\LikeCoffee;
use Illuminate\Support\Facades\Auth;
use Cloudinary;                             //画像投稿機能のための宣言．Cloudinaryを使用する

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
        
        //JavaScript無効時．画像が1.5MB以上の場合の処理
        if ($request->file('image') && $request->file('image')->getSize() > 1.5 * 1024 * 1024) {
            return redirect()->back()->withErrors(['image' => '画像サイズは1.5MBまで']);
        }
        
        //投稿機能
        $input = $request['post'];                              //['post']：ビューファイル上でのpost[bitter]などのリクエストパラメータを取得する．
        $input += ['user_id' => $request->user()->id];          //投稿に紐付いたuser_idを取得し，変数inputに入れる．
        
        //画像投稿機能
        if($request->file('image')) {                           //画像ファイルが送られたときのみ以下の処理を実行
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();       //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
            $input += ['image' => $image_url];                      //imageカラムにimageurlの情報を入れ，$inputに代入している．?
        }
        
        //投稿内容を保存
        $post->fill($input)->save();                            //保存処理
        return redirect('/posts/' . $post->id);
    }
    
    //投稿詳細
    //いいね情報をビューファイルに渡すように実装
    //ログインユーザーが投稿に対して「いいね」をしている場合，$niceに値が入る．
    public function show(CoffeePost $post) {
        // $like = Like::where('coffeepost_id', $post->id)->where('user_id', auth()->user()->id)->first();
        $like = auth()->user()->likesCoffeePosts()->where('id', $post->id)->first();
        return view('posts.show', compact('post', 'like'));
    }
    
    //投稿編集
    public function edit(CoffeePost $post) {
        $like = auth()->user()->likesCoffeePosts()->where('id', $post->id)->first();
        return view("posts.edit")->with(['post' => $post, 'like' => $like]);
    }
    
    //投稿編集実行
    public function update(CoffeePostRequest $request, CoffeePost $post) {
        
        //JavaScript無効時．画像が1.5MB以上の場合の処理
        if ($request->file('image') && $request->file('image')->getSize() > 1.5 * 1024 * 1024) {
            return redirect()->back()->withErrors(['image' => '画像サイズは1.5MBまで']);
        }
        
        $input_post = $request['post'];
        
        // 画像がアップロードされた場合
        if ($request->file('image')) {
            // Cloudinaryに新しい画像をアップロード
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post['image'] = $image_url;
    
            // 既存の画像をCloudinaryから削除
            if($post->image) {
                Cloudinary::destroy(str_replace(config('cloudinary.secure_base_url'), "", $post->image));
            }
        } 
        // 画像がアップロードされず、既存の画像が削除された場合
        else if ($post->image && !$request->has('image')) {
            // 既存の画像をCloudinaryから削除
            Cloudinary::destroy(str_replace(config('cloudinary.secure_base_url'), "", $post->image));
            $input_post['image'] = null; // 画像のURLをnullに設定
        }
        
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
