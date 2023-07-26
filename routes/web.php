<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeePostController;
use App\Http\Controllers\LikeController;

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

//いいねした投稿関係のルーティング
Route::middleware(['auth'])->group(function(){
    Route::get('/likes', [LikeController::class, 'likeindex'])->name('likes.index');                //いいねした投稿一覧
    Route::get('/likes/{post}', [LikeController::class, 'likeshow'])->name('likes.likeshow');       //いいねした投稿詳細
});

//投稿にいいねする関係のルーティング
Route::middleware(['auth'])->group(function(){
   //いいねをつける
   Route::get('/posts/like/{post}', [LikeController::class, 'like'])->name('like');         //いいねする
   //いいねをはずす
   Route::get('/posts/unlike/{post}', [LikeController::class, 'unlike'])->name('unlike');   //いいねをはずす
});

//画像投稿に関するルーティング
// Route::middleware(['auth'])->group(function() {
//     //画像をアップロードする．
//     Route::get('/upload', [UploadController::class, 'index'])->name('images.index');
//     Route::get('/create', [UploadController::class, 'cretae'])->name('images.create');
//     Route::get('/store', [UploadController::class, 'store'])->name('images.store');
// });

//Breeze機能の認証機能
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
