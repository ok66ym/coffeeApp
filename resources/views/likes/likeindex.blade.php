<x-app-layout>
            <!--いいねし投稿・データを表示-->
            <h1>いいね</h1>
            <div class='likesCoffeePosts'>
                @foreach ($likesPosts as $post)
                    
                    <!--コーヒー名表示-->
                    <div class='likesposts'>
                        <h2 class='likesCoffeePosts_name'>
                            <a href={{ route('likes.likeshowPost', ['post' => $post->id]) }}>{{ $post->name }}(みんなの投稿)</a>
                        </h2>
                    </div>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='post_info'>
                        苦味：{{ $post->bitter }} &nbsp 酸味：{{ $post->acidity }} &nbsp コク：{{ $post->rich }} &nbsp 甘味：{{ $post->sweet }} &nbsp 香り：{{ $post->smell }}
                    </div>
                @endforeach
            </div>
            
            <div class='likesCoffees'>
                @foreach ($likesCoffees as $coffee)
                    
                    <!--コーヒー名表示-->
                    <div class='likescoffee'>
                        <h2 class='likesCoffee_name'>
                            <a href={{ route('likes.likeshowCoffee', ['coffee' => $coffee->id]) }}>{{ $coffee->name }}</a>
                        </h2>
                    </div>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='post_info'>
                        苦味：{{ $coffee->bitter }} &nbsp 酸味：{{ $coffee->acidity }} &nbsp コク：{{ $coffee->rich }} &nbsp 甘味：{{ $coffee->sweet }} &nbsp 香り：{{ $coffee->smell }}
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション実装．投稿内容の10個分を表示-->
            
</x-app-layout>
