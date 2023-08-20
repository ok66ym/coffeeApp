    <x-app-layout>
        <div class="pt-20 pb-40">

            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100 relative w-full">
                <!--投稿結果を表示-->
                <h1 class="flex justify-center mt-5 ml-5 border-b-4 border-orange-800 w-96 text-gray-700">
                    検索結果一覧
                </h1>
                
                <h3 class="coffeeposts_evaluation mt-5">
                    <h3 class="text-gray-700 font-bold mb-3">あなたの検索内容</h3>
                    <div class="flex items-center space-x-4">
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">苦味</span> {{ $postsearchInfo['bitter'] }}
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</span> {{ $postsearchInfo['acidity'] }}
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</span> {{ $postsearchInfo['rich'] }} 
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</span> {{ $postsearchInfo['sweet'] }} 
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</span> {{ $postsearchInfo['smell'] }}
                    </div>
                </h3>
                
                <div class="border-t font-bold border-orange-300 text-base mt-10 mb-10  w-1/3">
                    @if($postsearches->isEmpty())
                        <div class="flex justify-center items-center h-full mt-10">
                            <p class="text-gray-700 text-center">
                                コーヒーが見つかりませんでした...
                            </p>
                        </div>
                    @else
                        <div class='border-t border-b border-orange-300 mt-10 mb-10 w-1/3'>
                            @foreach ($postsearches as $postsearch)
                                <div class="border-t border-b border-orange-300 py-3 flex justify-between items-center">
                                    <div>
                                        <!-- コーヒー名を表示 -->
                                        <div class='db_name'>
                                            <h2 class='dbsearchname'>
                                                <!--<a href="{{ $postsearch->shop_url }}" target="_blank">{{ $postsearch->name }}</a>-->
                                                <a class="text-base p-50 text-gray-700 font-bold hover:text-orange-700 rounded transition duration-300 no-underline" href="{{ route('searches.postshow', $postsearch->id) }}" >{{ $postsearch->name }}</a>
                                            </h2>
                                        </div>
                                        
                                        <!-- 苦味、酸味、コク、甘味、香りの表示部分 -->
                                        <div class="flex items-center space-x-4 mt-2 text-sm">
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">苦味</span> {{ $postsearch->bitter }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</span> {{ $postsearch->acidity }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</span> {{ $postsearch->rich }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</span> {{ $postsearch->sweet }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</span> {{ $postsearch->smell }}
                                        </div>
                                    </div>
                        
                                    <!-- いいね機能 -->
                                    <div class="flex items-center space-x-2 text-sm">
                                        @if(Auth::user()->likesCoffees->contains($postsearch->id))
                                            <!--いいね状態-->
                                            <a href="{{ route('unlikeCoffee', $postsearch) }}" class="btn btn-link btn-sm">
                                                <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                                            </a>
                                        @else
                                            <!--いいねしていない状態-->
                                            <a href="{{ route('likeCoffee', $postsearch) }}" class="btn btn-link btn-sm">
                                                <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                                            </a>
                                        @endif
                                        
                                        <!-- いいねの数 -->
                                        <div class="like_counte">
                                            {{ $postsearch->likes->count() }}
                                        </div>
                                    </div>
                        
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="flex justify-center items-center mt-5">
                    <a href='/search/db' class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                        検索に戻る
                    </a>
                </div>
            </div>
        </div>
            
    </x-app-layout>
