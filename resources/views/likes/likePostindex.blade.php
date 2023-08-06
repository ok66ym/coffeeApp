<x-app-layout>
            <!--いいねし投稿・データを表示-->
            
            <h2>みんなの投稿</h2>
            <div class='likesCoffeePosts'>
                @foreach ($likesPosts as $post)
                    
                    <!--コーヒー名表示-->
                    <div class='likesposts'>
                        <h2 class='likesCoffeePosts_name'>
                            <a href={{ route('likes.likeshowPost', ['post' => $post->coffeepost_id]) }}>{{ $post->coffeepost->name }}(みんなの投稿)</a>
                        </h2>
                    </div>
                    
                    <small>投稿者: {{ $post->user->name }}</small>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='post_info'>
                        苦味：{{ $post->coffeepost->bitter }} &nbsp 酸味：{{ $post->coffeepost->acidity }} &nbsp コク：{{ $post->coffeepost->rich }} &nbsp 甘味：{{ $post->coffeepost->sweet }} &nbsp 香り：{{ $post->coffeepost->smell }}
                    </div>
                    
                @endforeach
            </div>
            <div class="likepost_pagination">
                {{ $likesPosts->links() }}
            </div>
            <div class="like_allindex">
                <a href="/likes">いいね一覧へ</a>
            </div>
</x-app-layout>
