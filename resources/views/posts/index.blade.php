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
            <!--認証済みのuser表示-->
            {{ Auth::user() -> name }} 
            
            <!--投稿作成外面の実装-->
            <a href='/posts/create'>投稿</a>
            
            <!--投稿内容を表示-->
            <h1>Name</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='name'>
                            <a href="/posts/{{ $post->id }}">{{ $post->name }}</a>
                        </h2>
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション実装．投稿内容の10分を表示-->
            <div class='paginate'>
                {{$posts->links()}}
            </div>
        </body>
    </x-app-layout>
</html>
