<x-app-layout>
            <!--投稿内容を表示-->
            <h1>投稿</h1>
            <div class='likes'>
                @foreach ($likes as $post)
                    <!--画像表示-->
                    @if($post->image)
                    <div class='post_image'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
                    
                    <!--コーヒー名表示-->
                    <div class='post'>
                        <h2 class='name'>
                            <a href={{ route('likes.likeshow', ['post' => $post->id]) }}>{{ $post->name }}</a>
                        </h2>
                    </div>
                @endforeach
            </div>
            
            <!--ページネーション実装．投稿内容の10分を表示-->
            <div class='paginate'>
                {{$likes->links()}}
            </div>
</x-app-layout>
