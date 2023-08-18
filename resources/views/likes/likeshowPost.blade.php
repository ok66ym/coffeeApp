<x-app-layout>
        <div class="pt-10 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 relative rounded p-8 w-4/5 md:w-1/2 lg:w-2/3">
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <a href="/likes/posts" class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            戻る
                        </a>
                    </div>
                    
                    <!--投稿情報-->
                    <!--画像表示-->
                    @if($post->image)
                    <div class='post_image'>
                        <img src="{{ $post->image }}" alt="画像が読み込めません。" class="w-80 h-80 object-cover"/>
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
                        <h2 class="text-gray-700">
                            {{ $post->name }}
                        </h2>
                        <!--いいね機能実装-->
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
                    </div>
                    
                    @if($post->species_name)
                    <h3 class="species_name">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> {{ $post->species_name }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    @if($post->area_name)
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> {{$post->area_name}}<br><br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> <span class="text-gray-400">情報なし</span><br><br>
                    </h3>
                    @endif
                    
                    @if($post->roasted)
                    <h3 class="roasted">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-3">焙煎度</span> {{ $post->roasted }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">焙煎度</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    <h3 class="coffeeposts_evaluation">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span> {{$post->bitter}} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">酸味</span> {{ $post->acidity }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">コク</span> {{ $post->rich }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">甘味</span> {{ $post->sweet }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">香り</span> {{ $post->smell }} <br><br>
                    </h3>
                    
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">販売店</span>
                        @if($post->shop_url)
                            <a class="text-black hover:text-gray-600 hover:bg-orange-400 no-underline rounded ursor-pointer" href="{{ $post->shop_url }}" target="_blank">{{ $post->shop_name }}(販売サイトへ)</a>
                        @else
                            {{ $post->shop_name }}
                        @endif
                    </h3>
                    
                    <div class="relative border-2 border-orange-300 mt-4 p-4 rounded max-w-xl">
                        <div class="absolute top-0 left-4 -mt-3 bg-orange-100 px-1">
                            <span class="bg-orange-300 px-2 py-1">
                                <b>コーヒーについて</b>
                            </span>
                        </div>
                        <p class="mt-2">{{ $post->explanation }}</p>
                    </div>
                </div>
            </div>
        </div>
                
        <script>
        </script>
</x-app-layout>
