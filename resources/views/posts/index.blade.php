<x-app-layout>
    <div class="pl-64">
        <!--認証済みのuser表示-->
        <p class="p-5">ユーザー名：{{ Auth::user() -> name }} </p>
        
        <div class="border border-black p-50 m-15 flex justify-center space-x-4">
            <!--投稿一覧へ-->
            <a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/">投稿</a>
            <!--いいね一覧へ-->
            <a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/likes">いいね</a>
        </div>
        <div class='posts flex flex-wrap'>
            @foreach ($posts as $post)
                <div class="p-15 border border-black w-1/3 flex flex-col justify-center">    
                    <!--画像表示-->
                    @if($post->image)
                    <div class='p-5 flex-grow flex justify-center items-center'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
                    </div>
                    @else
                    <div class="p-5 flex-grow flex justify-center items-center">
                        <p>No Image</p>
                    </div>
                    @endif
                    
                    <!--コーヒー名を表示-->
                    <div class='flex justify-center mb-5'>
                        <h2>
                            <a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/posts/{{ $post->id }}">{{ $post->name }}</a>
                        </h2>
                    </div>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='pb-10 flex justify-center'>
                        苦味：{{ $post->bitter }} &nbsp 酸味：{{ $post->acidity }} &nbsp コク：{{ $post->rich }} &nbsp 甘味：{{ $post->sweet }} &nbsp 香り：{{ $post->smell }}
                    </div>
                </div>
            @endforeach
        </div>
        
        <!--ページネーション実装．投稿内容の10分を表示-->
        <div class='paginate'>
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>