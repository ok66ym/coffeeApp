<x-app-layout>
        <div class="pt-10 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 relative rounded p-8 w-4/5 md:w-1/2 lg:w-2/3">
                    
                    <!-- 編集ページへのボタンを枠線の右上に配置 -->
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <a href="/posts/{{ $post->id }}/edit" class="lg:text-base text-sm bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            編集
                        </a>        
                    </div>
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <a href="/" class="lg:text-base text-sm bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            投稿一覧へ
                        </a>
                    </div>
                    
                    <!--投稿情報-->
                    <!--画像表示-->
                    @if($post->image)
                    <div class='p-5 post_image'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。" class="lg:w-80 lg:h-80 h-44 w-44 object-cover"/>
                    </div>
                    @else
                    <div class="p-5 flex-grow flex justify-center items-center">
                        <p>No Image</p>
                    </div>
                    @endif
                    <!--Postインスタンスのプロパティとして投稿者の名前情報を参照-->
                    <!--<small class="flex justify-end">投稿者：{{ $post->user->name }}<br><br></small>-->
                    
                    <!-- コーヒー名、いいねボタン、いいねの数 -->
                    <div class="flex items-center space-x-4">
                        <h2 class="md:text-lg text-base text-gray-700">
                            {{ $post->name }}
                        </h2>
                        <!--いいね機能実装-->
                        @if($like)
                            <!--いいね状態-->
                            <a href="{{ route('unlikeCoffeePost', $post) }}" class="btn btn-link btn-sm">
                                <i class="fas fa-heart lg:fa-2x fa-1x text-danger" style="color: red;"></i>
                            </a>
                        @else
                            <!--いいねしていない状態-->
                            <a href="{{ route('likeCoffeePost', $post) }}" class="btn btn-link btn-sm">
                                <i class="far fa-heart lg:fa-2x fa-1x text-secondary" style="color: red;"></i>
                            </a>
                        @endif
                        <!-- いいねの数 -->
                        <div class="m-0like_counte">
                            {{ $post->likes->count() }}
                        </div>
                    </div>
                    
                    @if($post->species_name)
                    <h3 class="species_name">
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">種名</span> {{ $post->species_name }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">種名</span> <span class="md:text-2xl text-base text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    @if($post->area_name)
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">産地</span> {{$post->area_name}}<br><br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">産地</span> <span class="md:text-2xl text-base text-gray-400">情報なし</span><br><br>
                    </h3>
                    @endif
                    
                    @if($post->roasted)
                    <h3 class="roasted">
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded md-3">焙煎度</span> {{ $post->roasted }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded md-2">焙煎度</span> <span class="md:text-2xl text-base text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    <h3 class="md:text-xl text-xs p-2 flex justify-center flex-wrap">
                        <span class="bg-orange-300 text-gray-700 rounded">苦味</span>&nbsp{{$post->bitter}} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">酸味</span> {{ $post->acidity }}
                        <span class='xl:inline-block hidden mr-4'></span> <!-- xl以上でスペースを表示 -->
                        <span class='xl:hidden block'></span> <!-- xl未満で改行を挿入 -->
                        <span class="bg-orange-300 text-gray-700 rounded">コク</span>&nbsp{{ $post->rich }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">甘味</span>&nbsp{{ $post->sweet }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">香り</span>&nbsp{{ $post->smell }}
                    </h3>
                    
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded md-2">販売店</span>
                        @if($post->shop_url)
                            <a class="md:text-lg text-base text-black hover:text-gray-600 hover:bg-orange-400 no-underline rounded ursor-pointer" href="{{ $post->shop_url }}" target="_blank">{{ $post->shop_name }}<br><span class="flex justify-center items-center">(販売サイトへ)</span></a>
                        @else
                            <span class="md:text-lg text-base">{{ $post->shop_name }}</span>
                        @endif
                    </h3>
                    
                    <div class="flex flex-col border-2 border-orange-300 mt-4 mb-4 p-4 rounded max-w-xl min-h-32">
                        <div class="mb-2 bg-orange-100">
                            <span class="md:text-lg text-base bg-orange-300 px-2 py-1">
                                <b>コーヒーについて</b>
                            </span>
                        </div>
                        <p class="md:text-base text-sm">{{ $post->explanation }}</p>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 mt-2 mb-2 mr-2">
                        <!--投稿削除ボタン-->
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                             @csrf
                             @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})" class="flex justify-center items-center lg:text-base text-sm bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">投稿を削除</button>
                        </form>
                    </div>
                </div>
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
