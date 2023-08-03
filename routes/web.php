<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeePostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;

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
    Route::get('/likes', [LikeController::class, 'likeindex'])->name('likes.index');                //いいねした投稿一覧
    //いいねした投稿詳細表示
    Route::get('/likes/posts/{post}', [LikeController::class, 'likeshowPost'])->name('likes.likeshowPost');
    //いいねしたデータベース上のコーヒー詳細表示
    Route::get('/likes/coffees/{coffee}', [LikeController::class, 'likeshowCoffee'])->name('likes.likeshowCoffee');
});

//投稿にいいねする関係のルーティング
Route::middleware(['auth'])->group(function(){
   Route::get('/posts/like/{post}', [LikeController::class, 'likeCoffeePost'])->name('likeCoffeePost');         //いいねする
   Route::get('/posts/unlike/{post}', [LikeController::class, 'unlikeCoffeePost'])->name('unlikeCoffeePost');   //いいねをはずす
   Route::get('/search/db/results/like/{coffee}', [LikeController::class, 'LikeCoffee'])->name('likeCoffee');
   Route::get('/search/db/results/unlike/{coffee}', [LikeController::class, 'unlikeCoffee'])->name('unlikeCoffee');
});

//検索機能ページへの遷移
Route::middleware(['auth'])->group(function(){
    Route::get('/search', [SearchController::class, 'search'])->name('searches.index');                  //検索選択ページ
    Route::get('/search/db', [SearchController::class, 'dbsearch'])->name('search.dbsearch');            //データベース検索ページ
    Route::get('/search/db/results', [SearchController::class, 'dbresult'])->name('search.dbresults');   //データベース検索結果
    Route::get('/search/posts', [SearchController::class, 'postsearch'])->name('search.postsearch');     //投稿検索ページ
});

//Breeze機能の認証機能
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
