<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--FontAwesomeの導入-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <!--CSSファイルの読み込み-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>

            <!--投稿情報-->
            <h2 class"name">
                {{ $post->name }}
            </h2>
            
            <h3 class="species_name">
                種名：{{ $post->species_name }}
            </h3>
            
            <h3 class="area_name">
                産地：{{ $post->area_name }}
            </h3>
            
            <h4 class="coffeeposts_evaluation">
                苦味：{{$post->bitter}} &nbsp 酸味：{{ $post->acidity }} &nbsp コク：{{ $post->rich }} &nbsp 甘味：{{ $post->sweet }} &nbsp 香り：{{ $post->smell }}
            </h4>
            
            <h4 class="roasted">
                焙煎度：{{ $post->roasted }}
            </h4>
            
            <h3>
                販売店：<a href={{ $post->shop_url }}>{{ $post->shop_name }}</a>
            </h3>
            
            <p><b>コーヒーについて</b><br>{{ $post->explanation }}</p>
            
            <!--Postインスタンスのプロパティとして投稿者の名前情報を参照-->
            <small>投稿者：{{ $post->user->name }}<br><br></small>
            
            <!--いいね機能実装-->
                <!-- ハートボタン -->
            @if($like)
                <!--いいね状態-->
                <a href="{{ route('unlike', ['post' => $post->id]) }}" class="btn btn-link btn-sm">
                    <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                </a>
            @else
                <!--いいねしていない状態-->
                <a href="{{ route('like', ['post' => $post->id]) }}" class="btn btn-link btn-sm">
                    <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                </a>
            @endif

            <!-- いいねの数 -->
            <div class="like_counte">
                {{ $post->likes->count() }}
            </div>

            <div class="footer">
                <a href="/likes">いいね一覧へ</a>
            </div>
            
        </body>
    </x-app-layout>
</html>
