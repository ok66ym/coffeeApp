    <x-app-layout>
            <!--投稿結果を表示-->
            <h1>検索結果一覧</h1>
            
            <div class="search_info">
                <p>検索情報</p>
                苦味：{{ $searchInfo['bitter'] }} &nbsp 酸味：{{ $searchInfo['acidity'] }} &nbsp コク：{{ $searchInfo['rich'] }} &nbsp 甘味：{{ $searchInfo['sweet'] }} &nbsp 香り：{{ $searchInfo['smell'] }}
            </div>

            
            <div class='dbresults'>
                @foreach ($dbsearches as $search)
                    <!--コーヒー名を表示-->
                    <div class='db_name'>
                        <h2 class='name'>
                            <a href="{{ $search->shop_url }}" target="_blank">{{ $search->name }}</a>
                        </h2>
                    </div>
                    <div class='db_info'>
                        苦味：{{ $search->bitter }} &nbsp 酸味：{{ $search->acidity }} &nbsp コク：{{ $search->rich }} &nbsp 甘味：{{ $search->sweet }} &nbsp 香り：{{ $search->smell }}
                    </div>
                    <!--いいね機能実装-->
                        <!-- ハートボタン -->
                    @if($search->like)
                        <!--いいね状態-->
                        <a href="{{ route('unlikeCoffee', $search) }}" class="btn btn-link btn-sm">
                            <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                        </a>
                    @else
                        <!--いいねしていない状態-->
                        <a href="{{ route('likeCoffee', $search) }}" class="btn btn-link btn-sm">
                            <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                        </a>
                    @endif
                    <!-- いいねの数 -->
                    <div class="like_counte">
                        {{ $search->likes->count() }}
                    </div>
                @endforeach
            </div>
            
            <a href='/search/db'>検索ページへ</a>
            
    </x-app-layout>
