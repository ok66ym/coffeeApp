<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchStore;
use Illuminate\Support\Facades\Auth;


class SearchStoreController extends Controller
{
    //検索履歴一覧表示
    public function indexHistory(SearchStore $searchstore) {
        
        //ログインユーザー情報を取得
        $user_Id = AUth::id();
        
        //user情報を持ってくる
        $searchstores = SearchStore::where('user_id', $user_Id)->get();
        
        //ページネーション関数を呼び出す
        $searchstores = $searchstore->getHistryPaginateBylimit($user_Id);
        
        return view('histories.searchhistory')->with(['searchstores' => $searchstores]);
    }
    
    //検索履歴を1つずつ削除
    public function deleteHistory(SearchStore $searchstore) {
        $searchstore->delete();
        return redirect('/histories');
    }
    
    //検索履歴を一括で削除
    public function allDeleteHistory() {
        $user_Id = Auth::id();
        SearchStore::where('user_id', $user_Id)->delete();
        return redirect('/histories')->with('message', '全ての検索履歴を削除しました。');
    }

}
