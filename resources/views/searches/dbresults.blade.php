    <x-app-layout>
            <!--投稿結果を表示-->
            <h1>検索結果一覧</h1>
            
            <div class="dbsearch_info">
                <p>検索情報</p>
                苦味：{{ $dbsearchInfo['bitter'] }} &nbsp 酸味：{{ $dbsearchInfo['acidity'] }} &nbsp コク：{{ $dbsearchInfo['rich'] }} &nbsp 甘味：{{ $dbsearchInfo['sweet'] }} &nbsp 香り：{{ $dbsearchInfo['smell'] }}<br><br>
            </div>

            
            <div class='dbresults'>
                @foreach ($dbsearches as $dbsearch)
                
                    <div class="dbsearch_score">
                        <p>マッチレベル</p>
                        <p>
                            <p>{{ number_format($dbsearch->rating, 1) }} / 5.0</p>
                        </p>
                    </div>
                    
                    <!--コーヒー名を表示-->
                    <div class='db_name'>
                        <h2 class='dbsearchname'>
                            <a href="{{ $dbsearch->shop_url }}" target="_blank">{{ $dbsearch->name }}</a>
                        </h2>
                    </div>
                    <div class='db_info'>
                        苦味：{{ $dbsearch->bitter }} &nbsp 酸味：{{ $dbsearch->acidity }} &nbsp コク：{{ $dbsearch->rich }} &nbsp 甘味：{{ $dbsearch->sweet }} &nbsp 香り：{{ $dbsearch->smell }}
                    </div>
                    <!--いいね機能実装-->
                        <!-- ハートボタン -->
                    @if(Auth::user()->likesCoffees->contains($dbsearch->id))
                        <!--いいね状態-->
                        <a href="{{ route('unlikeCoffee', $dbsearch) }}" class="btn btn-link btn-sm">
                            <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                        </a>
                    @else
                        <!--いいねしていない状態-->
                        <a href="{{ route('likeCoffee', $dbsearch) }}" class="btn btn-link btn-sm">
                            <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                        </a>
                    @endif
                    <!-- いいねの数 -->
                    <div class="like_counte">
                        {{ $dbsearch->likes->count() }}<br><br>
                    </div>
                    
                @endforeach
            </div>
                
            <a href='/search/db'>検索ページへ</a>
            
    </x-app-layout>
