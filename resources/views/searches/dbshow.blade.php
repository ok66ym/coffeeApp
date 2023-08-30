<x-app-layout>
        <div class="pt-10 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 relative rounded p-8 w-4/5 md:w-1/2 lg:w-2/3">
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <button onclick="goBack()" class="lg:text-base text-sm text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            検索結果一覧に戻る
                        </button>
                    </div>
                    
                    <!--投稿情報-->
                    <!-- コーヒー名、いいねボタン、いいねの数 -->
                    <div class="flex items-center space-x-4 mt-3">
                        <h2 class="font-bold md:text-lg text-sm text-gray-700">
                            {{ $searchdb->name }}
                        </h2>
                        <!-- いいね機能 -->
                        @if(Auth::user()->likesCoffees->contains($searchdb->id))
                            <!--いいね状態-->
                            <a href="{{ route('unlikeCoffee', $searchdb) }}" class="btn btn-link btn-sm">
                                <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                            </a>
                        @else
                            <!--いいねしていない状態-->
                            <a href="{{ route('likeCoffee', $searchdb) }}" class="btn btn-link btn-sm">
                                <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                            </a>
                        @endif
                        
                        <!-- いいねの数 -->
                        <div class="like_counte">
                            {{ $searchdb->likes->count() }}
                        </div>
                    </div>
                    
                    @if($searchdb->species_name)
                    <h3 class="species_name">
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">種名</span><span class="md:text-base text-sm">{{ $searchdb->species_name }}</span><br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">種名</span> <span class="md:text-base text-xs text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    @if($searchdb->area_name)
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">産地</span><span class="md:text-base text-sm">{{$searchdb->area_name}}</span><br><br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded">産地</span> <span class="md:text-base text-xs text-gray-400">情報なし</span><br><br>
                    </h3>
                    @endif
                    
                    @if($searchdb->roasted)
                    <h3 class="roasted">
                        <span class="md:text-lg text-base bg-orange-300 text-gray-700 px-1 rounded md-3">焙煎度</span><span class="md:text-base text-sm">{{ $searchdb->roasted }}</span><br>
                    </h3>
                    @else
                    <h3>
                        <span class="md:text-lg text-sm bg-orange-300 text-gray-700 px-1 rounded md-2">焙煎度</span> <span class="md:text-base text-xs text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    <h3 class="md:text-lg text-xs p-2 flex justify-center flex-wrap">
                       <span class="bg-orange-300 text-gray-700 rounded">苦味</span>&nbsp{{$searchdb->bitter}} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">酸味</span> {{ $searchdb->acidity }}　&nbsp
                        <!--<span class='xl:hidden block'></span>-->
                        <span class="bg-orange-300 text-gray-700 rounded">コク</span>&nbsp{{ $searchdb->rich }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">甘味</span>&nbsp{{ $searchdb->sweet }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 rounded">香り</span>&nbsp{{ $searchdb->smell }}
                    </h3>
                    
                    <h3>
                        <span class="flex justify-center items-center md:text-lg text-base bbg-orange-300 text-gray-700 px-1 rounded md-2">販売店</span>
                        @if($searchdb->shop_url)
                            <a class="flex justify-center items-center md:text-lg text-base text-black hover:text-gray-600 hover:bg-orange-400 no-underline rounded ursor-pointer" href="{{ $searchdb->shop_url }}" target="_blank">{{ $searchdb->shop_name }}<br><span class="flex justify-center items-center">(販売サイトへ)</span></a>
                        @else
                            <span class="flex justify-center items-center md:text-lg text-base">{{ $searchdb->shop_name }}</span>
                        @endif
                    </h3>
                    
                </div>
            </div>
        </div>
                
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
</x-app-layout>
