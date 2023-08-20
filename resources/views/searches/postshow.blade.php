<x-app-layout>
        <div class="pt-10 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 relative rounded p-8 w-4/5 md:w-1/2 lg:w-2/3">
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <!--<a href="/likes/posts" class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">-->
                        <!--    戻る-->
                        <!--</a>-->
                        <button onclick="goBack()" class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer">
                            検索結果一覧に戻る
                        </button>
                    </div>
                    
                    <!--投稿情報-->
                    <!--画像表示-->
                    @if($searchpost->image)
                    <div class='post_image'>
                        <img src="{{ $searchpost->image }}" alt="画像が読み込めません。" class="w-80 h-80 object-cover"/>
                    </div>
                    @else
                    <div class="p-5 flex-grow flex justify-center items-center">
                        <p>No Image</p>
                    </div>
                    @endif
                    
                    <!-- コーヒー名、いいねボタン、いいねの数 -->
                    <div class="flex items-center space-x-4">
                        <h2 class="text-gray-700">
                            {{ $searchpost->name }}
                        </h2>

                        <!--いいね機能実装-->
                        @if(Auth::user()->likesCoffeePosts->contains($searchpost->id))
                            <!--いいね状態-->
                            <a href="{{ route('unlikeCoffeePost', ['post' => $searchpost->id]) }}" class="btn btn-link btn-sm">
                                <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                            </a>
                        @else
                            <!--いいねしていない状態-->
                            <a href="{{ route('likeCoffeePost', ['post' => $searchpost->id]) }}" class="btn btn-link btn-sm">
                                <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                            </a>
                        @endif
                        <!-- いいねの数 -->
                        <div class="like_counte">
                            {{ $searchpost->likes->count() }}
                        </div>
                    </div>
                    
                    @if($searchpost->species_name)
                    <h3 class="species_name">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> {{ $searchpost->species_name }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    @if($searchpost->area_name)
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> {{$searchpost->area_name}}<br><br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> <span class="text-gray-400">情報なし</span><br><br>
                    </h3>
                    @endif
                    
                    @if($searchpost->roasted)
                    <h3 class="roasted">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-3">焙煎度</span> {{ $searchpost->roasted }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">焙煎度</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    <h3 class="coffeeposts_evaluation">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span> {{ $searchpost->bitter}} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">酸味</span> {{ $searchpost->acidity }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">コク</span> {{ $searchpost->rich }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">甘味</span> {{ $searchpost->sweet }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">香り</span> {{ $searchpost->smell }} <br><br>
                    </h3>
                    
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">販売店</span>
                        @if($searchpost->shop_url)
                            <a class="text-black hover:text-gray-600 hover:bg-orange-400 no-underline rounded ursor-pointer" href="{{ $searchpost->shop_url }}" target="_blank">{{ $searchpost->shop_name }}(販売サイトへ)</a>
                        @else
                            {{ $searchpost->shop_name }}
                        @endif
                    </h3>
                    
                    <div class="flex flex-col border-2 border-orange-300 mt-4 p-4 rounded max-w-xl min-h-32">
                        <div class="mb-2 bg-orange-100">
                            <span class="bg-orange-300 px-2 py-1">
                                <b>コーヒーについて</b>
                            </span>
                        </div>
                        <p>{{ $searchpost->explanation }}</p>
                    </div>
                </div>
            </div>
        </div>
                
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
</x-app-layout>
