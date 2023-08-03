<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\LikeCoffeePost;
use App\Models\LikeCoffee;
use App\Models\Coffee;
use Illuminate\Support\Facades\Auth;
use App\Models\CoffeePost;

class LikeController extends Controller
{
    
    //いいねした投稿一覧表示
    public function likeindex() {
        //ログインユーザーがいいねした投稿を取得
        $likesPosts = auth()->user()->likesCoffeePosts()->paginate(10);
        
        //ログインユーザーがいいねしたデータベース上のデータを取得
        $likesCoffees = auth()->user()->likesCoffees()->paginate(10);
        
        return view('likes.likeindex', ['likesPosts' => $likesPosts, 'likesCoffees' => $likesCoffees ]);
    }
    
    //いいねした投稿詳細表示
    public function likeshowPost(CoffeePost $post) {
        $like = auth()->user()->likesCoffeePosts()->where('id', $post->id)->first();
        return view('likes.likeshowPost', ['post' => $post, 'like' => $like]);
    }
    
    //いいねしたデータベース上のデータの詳細表示
    public function likeshowCoffee(Coffee $coffee) {
        $like = auth()->user()->likesCoffees()->where('coffee_id', $coffee->id)->exists();
        return view('likes.likeshowCoffee', ['coffee' => $coffee, 'like' => $like]);
    }
    
    //CoffeePostにいいねをつける
    public function likeCoffeePost(CoffeePost $post) {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーが既に該当のポストを"like"しているかどうか確認
        if (!$user->likesCoffeePosts()->where('coffeepost_id', $post->id)->exists()) {
            // "like"していなければリレーションシップを作成
            $user->likesCoffeePosts()->attach($post);
        }

        return back();
    }
    
    //Coffeeにいいねをつける
    public function likeCoffee(Coffee $coffee) {
        $user = Auth::user();
        if (!$user->likesCoffees()->where('coffee_id', $coffee->id)->exists()) {
            $user->likesCoffees()->attach($coffee);
        }
        return back();
    }

    //CoffeePostのいいねをはずす
    public function unlikeCoffeePost(CoffeePost $post) {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーが既に該当のポストを"like"しているかどうか確認
        if ($user->likesCoffeePosts()->where('coffeepost_id', $post->id)->exists()) {
            // "like"していればリレーションシップを削除
            $user->likesCoffeePosts()->detach($post->id);
        }

        return back();
    }
    
     //Coffeeのいいねをはずす
    public function unlikeCoffee(Coffee $coffee) {
        $user = Auth::user();
        if ($user->likesCoffees()->where('coffee_id', $coffee->id)->exists()) {
            $user->likesCoffees()->detach($coffee->id);
        }
        return back();
    }
}
