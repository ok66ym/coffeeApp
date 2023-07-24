<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <!--投稿編集ページへ-->
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
            
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
            
            
            <!--投稿削除ボタン-->
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                 @csrf
                 @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">削除<br><br></button>
            </form>


            <div class="footer">
                <a href="/">マイページへ</a>
            </div>
            
            <!--削除確認のダイヤログ表示-->
            <script>
                function deletePost(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            
        </body>
    </x-app-layout>
</html>
