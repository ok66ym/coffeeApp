<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeePostController;

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

//CoffeePost関係のルーティング
Route::controller(CoffeePostController::class)->middleware(['auth'])->group(function(){
   Route::get('/', 'index')->name('index');                 //投稿一覧
   Route::get('/posts/create', 'create')->name('create');   //新規投稿作成
   Route::post('/posts', 'store')->name('store');           //投稿を保存
   Route::get('/posts/{post}', 'show')->name('show');       //投稿詳細
});

//Breeze機能の認証機能
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
