<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
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
            
            <!--Postインスタンスのプロパティとして投稿者の名前情報を参照-->
            <small>{{ $post->user->name }}</small>

            <div class="footer">
                <a href="/">マイページへ</a>
            </div>
        </body>
    </x-app-layout>
</html>
