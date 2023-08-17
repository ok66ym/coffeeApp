<x-app-layout>
        <div class="pt-20 pb-40">
            <!--投稿編集ページへ-->
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
            
            <!--投稿情報-->
            <!--画像表示-->
            @if($post->image)
            <div class='post_image'>
                <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
            </div>
            @endif
            
            <h2 class"name">
                {{ $post->name }}
            </h2>
            
            <h3 class="species_name">
                種名：{{ $post->species_name }}
            </h3>
            
            <h3 class="area_name">
                産地：{{ $post->area_name }}
            </h3>
            
            <h4 class="coffeeposts_evaluation">
                苦味：{{$post->bitter}} &nbsp 酸味：{{ $post->acidity }} &nbsp コク：{{ $post->rich }} &nbsp 甘味：{{ $post->sweet }} &nbsp 香り：{{ $post->smell }}
            </h4>
            
            <h4 class="roasted">
                焙煎度：{{ $post->roasted }}
            </h4>
            
            <h3>
                販売店：<a href="{{ $post->shop_url }}" target="_blank">{{ $post->shop_name }}</a>
            </h3>
            
            <p><b>コーヒーについて</b><br>{{ $post->explanation }}</p>
            
            <!--Postインスタンスのプロパティとして投稿者の名前情報を参照-->
            <small>投稿者：{{ $post->user->name }}<br><br></small>
            
            <!--いいね機能実装-->
                <!-- ハートボタン -->
            @if($like)
                <!--いいね状態-->
                <a href="{{ route('unlikeCoffeePost', $post) }}" class="btn btn-link btn-sm">
                    <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                </a>
            @else
                <!--いいねしていない状態-->
                <a href="{{ route('likeCoffeePost', $post) }}" class="btn btn-link btn-sm">
                    <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                </a>
            @endif
            
            <!-- いいねの数 -->
            <div class="like_counte">
                {{ $post->likes->count() }}
            </div>
            
            
            <!--投稿削除ボタン-->
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                 @csrf
                 @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">投稿を削除<br><br></button>
            </form>


            <div class="footer">
                <a href="/">マイページへ</a>
            </div>
        </div>
            
            <!--削除確認のダイヤログ表示-->
            <script>
                function deletePost(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
</x-app-layout>
