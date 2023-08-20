<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeePostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchStoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/', function () {
//     return view('welcome');
// });

//Breezeのダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//投稿関係のルーティング
Route::middleware(['auth'])->group(function(){
   Route::get('/', [CoffeePostController::class, 'index'])->name('index');                 //投稿一覧
   Route::post('/posts', [CoffeePostController::class, 'store'])->name('store');           //投稿を保存
   Route::get('/posts/create', [CoffeePostController::class, 'create'])->name('create');   //新規投稿作成
   Route::get('/posts/{post}', [CoffeePostController::class, 'show'])->name('show');       //投稿詳細
   Route::put('/posts/{post}', [CoffeePostController::class, 'update']);                   //投稿編集実行
   Route::delete('/posts/{post}', [CoffeePostController::class, 'delete']);                //投稿削除
   Route::get('/posts/{post}/edit', [CoffeePostController::class, 'edit']);                //投稿編集表示
});

//いいねした投稿表示関係のルーティング
Route::middleware(['auth'])->group(function(){
    Route::get('/likes', [LikeController::class, 'likeIndex'])->name('likes.index');                                //いいね一覧画面へ
    Route::get('/likes/coffees', [LikeController::class, 'likeCoffeeIndex'])->name('likes.coffeeindex');            //いいねした投稿一覧
    Route::get('/likes/posts', [LikeController::class, 'likePostIndex'])->name('likes.postindex');                  //いいねしたデータベース上のデータ一覧
    //いいねしたデータベース上のコーヒー詳細表示
    Route::get('/likes/coffee/{coffee}', [LikeController::class, 'likeshowCoffee'])->name('likes.likeshowCoffee');
    //いいねした投稿詳細表示
    Route::get('/likes/post/{post}', [LikeController::class, 'likeshowPost'])->name('likes.likeshowPost');
});

//検索したデータと投稿にいいねする関係のルーティング
Route::middleware(['auth'])->group(function(){
   Route::get('/search/posts/results/like/{post}', [LikeController::class, 'likeCoffeePost'])->name('likeCoffeePost');              //投稿内容についていいねする
   Route::get('/search/posts/results/unlike/{post}', [LikeController::class, 'unlikeCoffeePost'])->name('unlikeCoffeePost');        //投稿内容いいねをはずす
   Route::get('/search/db/results/like/{coffee}', [LikeController::class, 'LikeCoffee'])->name('likeCoffee');                       //DBのデータに対していいねをする
   Route::get('/search/db/results/unlike/{coffee}', [LikeController::class, 'unlikeCoffee'])->name('unlikeCoffee');                 //DBのデータに対していいねをはずす
});

//検索機能ページへの遷移
Route::middleware(['auth'])->group(function(){
    Route::get('/search', [SearchController::class, 'search'])->name('searches.index');                         //検索選択ページ
    Route::get('/search/db', [SearchController::class, 'dbsearch'])->name('search.dbsearch');                   //データベース検索ページ
    Route::get('/search/db/results', [SearchController::class, 'dbresult'])->name('search.dbresults');          //データベース検索結果
    Route::get('/search/db/results/{coffee}', [SearchController::class, 'dbshow'])->name('searches.dbshow');
    Route::get('/search/posts', [SearchController::class, 'postsearch'])->name('search.postsearch');            //投稿検索ページ
    Route::get('/search/posts/results', [SearchController::class, 'postresult'])->name('search.postresults');   //投稿検索結果
    Route::get('/search/posts/results/{post}', [SearchController::class, 'postshow'])->name('searches.postshow');
    //再検索
    Route::get('/research/db/results', [SearchController::class, 'redbresult'])->name('search.redbresults');                 //検索履歴からデータベースを再検索結果
    Route::get('/research/posts/results', [SearchController::class, 'repostresult'])->name('search.repostresults');         //検索履歴からみんなの投稿を再検索結果
});

//検索機能保存機能関係のルーティング
Route::middleware('auth')->group(function () {
    Route::get('/histories', [SearchStoreController::class, 'indexHistory'])->name('searchestores.index');                          //検索履歴一覧表示
    Route::delete('/histories/alldelete', [SearchStoreController::class, 'allDeleteHistory'])->name('histories.alldelete');         //検索履歴を一括で削除
    Route::delete('/histories/{searchstore}', [SearchStoreController::class, 'deleteHistory']);                                     //検索履歴は物理削除を採用．検索履歴を削除
});

//Breeze機能の認証機能
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
