<x-app-layout>
    <div class="pt-20 pb-40"> 
        
        <div class="flex flex-col justify-center items-center">
            <!--認証済みのuser表示-->
            <p class="sm:text-3xl text-base text-gray-900 p-2">{{ Auth::user() -> name }} </p>
            
            <div class="sm:text-2xl text-sm sm:p^5 p-2">
                <p>投稿数：<span class="sm:text-2xl text-sm text-orange-700">{{ $posts->count() }}</span></p>
            </div>
            
            <div class="sm:text-2xl text-sm text-gray-900 sm:p-2">
                {{ Auth::user() -> myinfo }}
            </div>
        </div>
        
        <div class="border border-gray-500 p-50 m-15 flex justify-center space-x-4 p-2">
            <!--投稿一覧へ-->
            <a class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline" href="/">投稿</a>
            <!--いいね一覧へ-->
            <a class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline" href="/likes">いいね</a>
        </div>
        <div class='posts flex flex-wrap'>
            @foreach ($posts as $post)
                <div class="p-15 border border-gray-500 sm:w-1/3 w-1/2 flex flex-col justify-center">    
                    <!--画像表示-->
                    @if($post->image)
                    <div class='p-5 flex-grow flex justify-center items-center'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。" class="sm:w-64 sm:h-64 w-32 h-32 object-cover"/>
                    </div>
                    @else
                    <div class="p-5 flex-grow flex justify-center items-center">
                        <p>No Image</p>
                    </div>
                    @endif
                    
                    <!--コーヒー名を表示-->
                    <div class='flex justify-center mb-5'>
                        <h2>
                            <a class="md:text-2xl text-base p-50 text-gray-700 font-bold hover:text-orange-700 transition rouded duration-300 no-underline" href="/posts/{{ $post->id }}">{{ $post->name }}</a>
                        </h2>
                    </div>
                    
                    <!--コーヒーの評価項目表示-->
                    <div class='md:text-xl text-xs pb-10 flex justify-center flex-wrap'>
                        苦味：{{ $post->bitter }} &nbsp 
                        酸味：{{ $post->acidity }} 
                        <span class='xl:inline hidden'>&nbsp</span> <!-- xl以上でスペースを表示 -->
                        <span class='xl:hidden block'></span> <!-- xl未満で改行を挿入 -->
                        コク：{{ $post->rich }} &nbsp 
                        甘味：{{ $post->sweet }} &nbsp 
                        香り：{{ $post->smell }}
                    </div>
                </div>
            @endforeach
        </div>
        
        <!--ページネーション実装．投稿内容の10コ分を表示-->
        <div class='paginate'>
            {{ $posts->links('paginator.custom') }}
        </div>
    
    <script>
    </script>
</x-app-layout>