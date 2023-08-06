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
    
    //データベース検索
    public function dbsearch() {
        return view('searches.dbsearch');
    }

    public function dbresult(Request $request) {
        
        //各評価項目に入力された数値$bitter, $acidty…に代入する
        $bitter = $request->input('db.bitter');
        $acidity = $request->input('db.acidity');
        $rich = $request->input('db.rich');
        $sweet = $request->input('db.sweet');
        $smell = $request->input('db.smell');
        
        //データ抽出アルゴリズム
        //重みを設定
         $weights = [
            'bitter' => 1.0,
            'acidity' => 1.0,
            'rich' => 1.0,
            'sweet' => 1.0,
            'smell' => 1.0,
        ];
        
        $coffees = Coffee::query();

        // 3より大きい：±0,5の範囲でデータ抽出(狭くデータを抽出)．3以下：±1.0の範囲でデータを抽出(広くデータを抽出)
        $inputs = ['bitter' => $bitter, 'acidity' => $acidity, 'rich' => $rich, 'sweet' => $sweet, 'smell' => $smell];
        foreach ($inputs as $item => $input) {
            // $input = $request->input($item);
            if($input <= 3) {
                $coffees = $coffees->whereBetween($item, [$input - 1, $input + 1]);
            } else {
                $coffees = $coffees->whereBetween($item, [$input - 0.5, $input + 0.5]);
            }
        }
            
        //検索情報を保持
        $dbsearchInfo = $inputs;
        
        $dbsearches = $coffees
            ->select("*")
            ->selectRaw("((bitter - ?) * ? + (acidity - ?) * ? + (rich - ?) * ? + (sweet - ?) * ? + (smell - ?) * ?) as score", [
                $request->input('bitter'),
                $weights['bitter'],
                $request->input('acidity'),
                $weights['acidity'],
                $request->input('rich'),
                $weights['rich'],
                $request->input('sweet'),
                $weights['sweet'],
                $request->input('smell'),
                $weights['smell'],
            ])
            ->orderBy('score', 'asc')  // スコアが小さい順に並べ替え
            ->get();
            
        //検索情報の一致度を計算
        // 5段階評価で完全に一致している(100%)の場合：5，90％以上100未満：4.5，80％以上90未満：4，70％以上80未満：3.5
        // 50％以上70未満：3，40％以上50未満：2.5，30％以上40未満：2，20％以上30未満：1.5，10％以上20未満：1，10％より小さい：0
            
            $dbsearch = $dbsearches->map(function ($dbsearch) use ($dbsearchInfo) {
                $input_sum = $dbsearchInfo['bitter'] + $dbsearchInfo['acidity'] + $dbsearchInfo['rich'] + $dbsearchInfo['sweet'] + $dbsearchInfo['smell'];
                $post_sum = $dbsearch->bitter + $dbsearch->acidity + $dbsearch->rich + $dbsearch->sweet + $dbsearch->smell;
                $match_percentage = ($input_sum / $post_sum) * 100;
                
                if ($match_percentage >= 100) {
                    $dbsearch->rating = 5;
                } elseif ($match_percentage >= 90) {
                    $dbsearch->rating = 4.5;
                } elseif ($match_percentage >= 80) {
                    $dbsearch->rating = 4;
                } elseif ($match_percentage >= 70) {
                    $dbsearch->rating = 3.5;
                } elseif ($match_percentage >= 50) {
                    $dbsearch->rating = 3;
                } elseif ($match_percentage >= 40) {
                    $dbsearch->rating = 2.5;
                } elseif ($match_percentage >= 30) {
                    $dbsearch->rating = 2;
                } elseif ($match_percentage >= 20) {
                    $dbsearch->rating = 1.5;
                } elseif ($match_percentage >= 10) {
                    $dbsearch->rating = 1;
                } else {
                    $dbsearch->rating = 0;
                }
                
                return $dbsearch;
            });
            
        // 検索値をセッションに保存
        $request->session()->put('search_values', $request->input('db'));

        
        return view('searches.dbresults')->with(['dbsearches' => $dbsearches, 'dbsearchInfo' => $dbsearchInfo]);
        
    }
    
    //投稿検索
    public function postsearch() {
        return view('searches.postsearch');
    }

    public function postresult(Request $request) {
        
        //各評価項目に入力された数値$bitter, $acidty…に代入する
        $bitter = $request->input('post.bitter');
        $acidity = $request->input('post.acidity');
        $rich = $request->input('post.rich');
        $sweet = $request->input('post.sweet');
        $smell = $request->input('post.smell');
        
        //データ抽出アルゴリズム
        //重みを設定
         $weights = [
            'bitter' => 1.0,
            'acidity' => 1.0,
            'rich' => 1.0,
            'sweet' => 1.0,
            'smell' => 1.0,
        ];
        
        $coffeeposts = CoffeePost::query();

        // 3より大きい：±0,5の範囲でデータ抽出(狭くデータを抽出)．3以下：±1.0の範囲でデータを抽出(広くデータを抽出)
        $inputs = ['bitter' => $bitter, 'acidity' => $acidity, 'rich' => $rich, 'sweet' => $sweet, 'smell' => $smell];
        foreach ($inputs as $item => $input) {
            // $input = $request->input($item);
            if($input <= 3) {
                $coffeeposts = $coffeeposts->whereBetween($item, [$input - 1, $input + 1]);
            } else {
                $coffeeposts = $coffeeposts->whereBetween($item, [$input - 0.5, $input + 0.5]);
            }
        }

        $postsearches = $coffeeposts
            ->select("*")
            ->selectRaw("((bitter - ?) * ? + (acidity - ?) * ? + (rich - ?) * ? + (sweet - ?) * ? + (smell - ?) * ?) as score", [
                $request->input('bitter'),
                $weights['bitter'],
                $request->input('acidity'),
                $weights['acidity'],
                $request->input('rich'),
                $weights['rich'],
                $request->input('sweet'),
                $weights['sweet'],
                $request->input('smell'),
                $weights['smell'],
            ])
            ->orderBy('score', 'asc')  // スコアが小さい順に並べ替え
            ->paginate(5);
        
        //検索情報を保持
        $postsearchInfo = $inputs;
        // $dbsearchInfo = [
        //     'bitter' => $bitter,
        //     'acidity' => $acidity,
        //     'rich' => $rich,
        //     'sweet' => $sweet,
        //     'smell' => $smell,
        // ];
        
        //検索情報の一致度を計算
        // 5段階評価で完全に一致している(100%)の場合：5，90％以上100未満：4.5，80％以上90未満：4，70％以上80未満：3.5
        // 50％以上70未満：3，40％以上50未満：2.5，30％以上40未満：2，20％以上30未満：1.5，10％以上20未満：1，10％より小さい：0
        
        $postsearches = $postsearches->map(function ($postsearch) use ($postsearchInfo) {
            $input_sum = $postsearchInfo['bitter'] + $postsearchInfo['acidity'] + $postsearchInfo['rich'] + $postsearchInfo['sweet'] + $postsearchInfo['smell'];
            $post_sum = $postsearch->bitter + $postsearch->acidity + $postsearch->rich + $postsearch->sweet + $postsearch->smell;
            $match_percentage = ($input_sum / $post_sum) * 100;
    
            $postsearch->match_percentage = $match_percentage;
            
            if ($match_percentage >= 100) {
                $postsearch->rating = 5;
            } elseif ($match_percentage >= 90) {
                $postsearch->rating = 4.5;
            } elseif ($match_percentage >= 80) {
                $postsearch->rating = 4;
            } elseif ($match_percentage >= 70) {
                $postsearch->rating = 3.5;
            } elseif ($match_percentage >= 50) {
                $postsearch->rating = 3;
            } elseif ($match_percentage >= 40) {
                $postsearch->rating = 2.5;
            } elseif ($match_percentage >= 30) {
                $postsearch->rating = 2;
            } elseif ($match_percentage >= 20) {
                $postsearch->rating = 1.5;
            } elseif ($match_percentage >= 10) {
                $postsearch->rating = 1;
            } else {
                $postsearch->rating = 0;
            }
            
            return $postsearch;
            
        });
        
        //検索値をセッションに保存
        $request->session()->put('search_values', $request->input('post'));
    
        return view('searches.postresults')->with(['postsearches' => $postsearches, 'postsearchInfo' => $postsearchInfo]);
    }
}
