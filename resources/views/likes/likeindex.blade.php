<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>いいね一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            
            <!--投稿内容を表示-->
            <h1>投稿</h1>
            <div class='likes'>
                @foreach ($likes as $post)
                    <div class='post'>
                        <h2 class='name'>
                            <a href={{ route('likes.likeshow', ['post' => $post->id]) }}>{{ $post->name }}</a>
                        </h2>
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション実装．投稿内容の10分を表示-->
            <div class='paginate'>
                {{$likes->links()}}
            </div>
        </body>
    </x-app-layout>
</html>
