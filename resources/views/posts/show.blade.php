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
            <h1 class=name>
                {{ $post->name }}
            </h1>
            
            <div class="footer">
                <a href="/">マイページへ</a>
            </div>
        </body>
    </x-app-layout>
</html>
