<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeCoffeePost;
use App\Models\LikeCoffee;
use App\Http\Requests\CoffeePostRequest;
use App\Models\CoffeePost;
use App\Models\Coffee;

class SearchController extends Controller
{
    //検索ページ
    public function search() {
        return view('searches.index');
    }
    
    public function dbsearch() {
        return view('searches.dbsearch');
    }
    
    //データベース検索
    public function dbresult(Request $request) {
        
        //各評価項目に入力された数値$bitter, $acidty…に代入する
        $bitter = $request->input('post.bitter');
        $acidity = $request->input('post.acidity');
        $rich = $request->input('post.rich');
        $sweet = $request->input('post.sweet');
        $smell = $request->input('post.smell');
        
        $dbsearches = Coffee::query()
            ->where('bitter', $bitter)
            ->where('acidity', $acidity)
            ->where('rich', $rich)
            ->where('sweet', $sweet)
            ->where('smell', $smell)
            ->get();
        
        //現在の$searchに対してユーザーが「いいね」をしているかどうかを判定する必要がある．
        //ビュー内で，$likeを求めるのではなくコントローラー内でそれぞれの$searchに対する'like'の存在をチェック    
        foreach ($dbsearches as $search) {
            $search->like = auth()->user()->likesCoffees()->where('coffee_id', $search->id)->first();
        }
        
        $searchInfo = [
            'bitter' => $bitter,
            'acidity' => $acidity,
            'rich' => $rich,
            'sweet' => $sweet,
            'smell' => $smell,
        ];
        return view('searches.dbresults')->with(['dbsearches' => $dbsearches, 'searchInfo' => $searchInfo]);
    }
    
    public function dbsearchShow(Coffee $coffee) {
        return view('searches.dbresultsShow')->with(['coffee' => $coffee]);
    }
    
    //投稿検索
    public function postsearch() {
        return view('searches.postsearch');
    }
}
