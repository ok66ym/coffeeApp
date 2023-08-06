<x-app-layout>
            <!--いいねし投稿・データを表示-->
            
            <h2>データベース上のデータ</h2>
            <div class='likesCoffees'>
                @foreach ($likesCoffees as $coffee)
                    
                    <!--コーヒー名表示-->
                    <div class='likescoffee'>
                        <h2 class='likesCoffee_name'>
                            <a href={{ route('likes.likeshowCoffee', ['coffee' => $coffee->coffee_id]) }}>{{ $coffee->coffee->name }}</a>
                        </h2>
                    </div>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='post_info'>
                        苦味：{{ $coffee->coffee->bitter }} &nbsp 酸味：{{ $coffee->coffee->acidity }} &nbsp コク：{{ $coffee->coffee->rich }} &nbsp 甘味：{{ $coffee->coffee->sweet }} &nbsp 香り：{{ $coffee->coffee->smell }}
                    </div>
                    
                @endforeach
            </div>
            <div class="likepost_pagination">
                {{ $likesCoffees->links() }}
            </div>
            
            <div class="like_allindex">
                <a href="/likes">いいね一覧へ</a>
            </div>
</x-app-layout>
