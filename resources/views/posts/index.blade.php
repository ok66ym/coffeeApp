    <x-app-layout>
            <!--認証済みのuser表示-->
            {{ Auth::user() -> name }} 
            
            <!--投稿作成外面の実装-->
            <a href='/posts/create'><br>新規投稿</a>
            
            <!--投稿内容を表示-->
            <h1>投稿</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <!--画像表示-->
                    @if($post->image)
                    <div class='post_image'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
                    
                    <!--コーヒー名を表示-->
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
    </x-app-layout>
