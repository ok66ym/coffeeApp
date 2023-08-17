    <x-app-layout>
        <div class="pt-20 pb-40">
            <!--投稿結果を表示-->
            <h1>検索結果一覧</h1>
            
            <div class="postsearch_info">
                <p>検索情報</p>
                苦味：{{ $postsearchInfo['bitter'] }} &nbsp 酸味：{{ $postsearchInfo['acidity'] }} &nbsp コク：{{ $postsearchInfo['rich'] }} &nbsp 甘味：{{ $postsearchInfo['sweet'] }} &nbsp 香り：{{ $postsearchInfo['smell'] }}
            </div>

            
            <div class='postresults'>
                @foreach ($postsearches as $postsearch)
                
                    <div class="postsearch_score">
                        <p>マッチレベル</p>
                        <p>
                            <p>{{ number_format($postsearch->rating, 1) }} / 5.0</p>
                        </p>
                    </div>
                    
                    <!--コーヒー名を表示-->
                    <div class='post_name'>
                        <h2 class='postsearch_name'>
                            <a href="{{ $postsearch->shop_url }}" target="_blank">{{ $postsearch->name }}</a>
                        </h2>
                    </div>
                    <div class='db_info'>
                        苦味：{{ $postsearch->bitter }} &nbsp 酸味：{{ $postsearch->acidity }} &nbsp コク：{{ $postsearch->rich }} &nbsp 甘味：{{ $postsearch->sweet }} &nbsp 香り：{{ $postsearch->smell }}
                    </div>
                    
                    <!--Postインスタンスのプロパティとして投稿者の名前情報を参照-->
                    <small>投稿者：{{ $postsearch->user->name }}<br><br></small>
                    
                    <!--いいね機能実装-->
                        <!-- ハートボタン -->
                    @if(Auth::user()->likesCoffeePosts->contains($postsearch->id))
                        <!--いいね状態-->
                        <a href="{{ route('unlikeCoffeePost', $postsearch) }}" class="btn btn-link btn-sm">
                            <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                        </a>
                    @else
                        <!--いいねしていない状態-->
                        <a href="{{ route('likeCoffeePost', $postsearch) }}" class="btn btn-link btn-sm">
                            <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                        </a>
                    @endif
                    <!-- いいねの数 -->
                    <div class="like_counte">
                        {{ $postsearch->likes->count() }}
                    </div>
                @endforeach
            </div>
            
            <a href='/search/posts'>検索ページへ</a>
        </div>
            
    </x-app-layout>
