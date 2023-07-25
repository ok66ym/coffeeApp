<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Models\CoffeePost;

class LikeController extends Controller
{
    
    //いいねした投稿一覧表示
    public function likeindex() {
        //ログインユーザーがいいねした投稿を取得
        $likes = auth()->user()->likes()->paginate(10);
        return view('likes.likeindex', compact('likes'));
    }
    
    //いいねした投稿詳細表示
    public function likeshow(CoffeePost $post) {
        $like = auth()->user()->likes()->where('id', $post->id)->first();
        return view('likes.likeshow', ['post' => $post, 'like' => $like]);
    }
    
    //いいねをつける
    public function like(CoffeePost $post) {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーが既に該当のポストを"like"しているかどうか確認
        if (!$user->likes->contains($post)) {
            // "like"していなければリレーションシップを作成
            $user->likes()->attach($post);
        }

        return back();
    }

    //いいねをはずす
    public function unlike(CoffeePost $post) {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーが既に該当のポストを"like"しているかどうか確認
        if ($user->likes()->where('coffeepost_id', $post->id)->exists()) {
            // "like"していればリレーションシップを削除
            $user->likes()->detach($post->id);
        }

        return back();
    }
}
