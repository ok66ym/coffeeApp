    <x-app-layout>
        <div class="pt-20 pb-40">

            <div class="ml-1 mr-1 flex flex-col justify-center items-center min-h-screen bg-orange-100 relative w-full">
                <!--投稿結果を表示-->
                <h1 class="ml-1 mr-1 flex justify-center items-center mt-5 ml-5 border-b-4 border-orange-800 w-96 md:text-2xl text-lg text-gray-700">
                    検索結果一覧
                </h1>
                
                <div class="coffeeposts_evaluation mt-5">
                    <h3 class="md:text-lg text-base text-gray-700 font-bold mb-3">あなたの検索内容</h3>
                    <div class="flex items-center space-x-2">
                        <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 rounded">苦味</p><span class="md:text-sm text-xs"> {{ $dbsearchInfo['bitter'] }} </span>
                        <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</p><span class="md:text-sm text-xs"> {{ $dbsearchInfo['acidity'] }} </span>
                        <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</p><span class="md:text-sm text-xs"> {{ $dbsearchInfo['rich'] }} </span>
                        <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</p><span class="md:text-sm text-xs"> {{ $dbsearchInfo['sweet'] }} </span>
                        <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</p><span class="md:text-sm text-xs"> {{ $dbsearchInfo['smell'] }} </span>
                    </div>
                </div>
                
                <!--説明文のポップアップ-->
                    <!-- ポップアップボタン -->
                    <div class="flex justify-center mt-3">
                        <button id="show-popup" class="flex justify-center items-center md:text-base text-sm md:px-3 md:py-1 px-2 py-1 bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold border border-orange-300 rounded cursor-pointer z-100">一致度について</button>
                    </div>
                
                    <!-- ポップアップの内容 -->
                    <div id="popup" class="fixed top-0 left-0 bg-black bg-opacity-50 hidden flex justify-center items-center mb-5 z-100 relative">
                        <div class="bg-yellow-100 border border-orange-900 p-8 rounded max-w-xl relative">
                            <p class="md:text-base text-sm">
                                一致度は，<b class="text-orange-700">検索した数値の合計</b>と<b class="text-orange-700">検索結果の数値の合計</b>との比率を計算しています．<br>
                                ※検索内容と一致していなくても一致度が高い場合があります．
                                
                            </p>
                            <div class="flex justify-center items-center">
                                <button id="close-popup" class="md:text-sm text-xs flex justify-center items-center p-4 border-0 focus:underline focus:text-white focus:text-black text-gray-700 rounded cursor-pointer ">×CLOSE</button>
                            </div>
                        </div>
                    </div>
                
                <div class="font-bold text-base mt-5 mb-10 flex flex-col justify-center items-center md:w-10/12">
                    @if($dbsearches->isEmpty())
                        <div class="flex justify-center items-center h-full mt-10">
                            <p class="md:text-xl text-sm text-gray-700 text-center">
                                コーヒーが見つかりませんでした...
                            </p>
                        </div>
                    @else
                        <div class='border-orange-300 flex flex-col justify-center items-center md:w-10/12'>
                            @foreach ($dbsearches as $dbsearch)
                                <div class="border-t border-b border-orange-300 py-3 flex justify-center items-center md:w-10/12">
                                    <div class="flex-1">
                                        <!-- コーヒー名を表示 -->
                                        <div class='db_name'>
                                            <h2 class='flex justify-beween items-center'>
                                                <a class="md:text-xl text-base p-50 text-gray-700 font-bold hover:text-orange-700 rounded transition duration-300 no-underline  break-words w-full" href="{{ route('searches.dbshow', $dbsearch->id) }}" >{{ $dbsearch->name }}</a>
                                            </h2>
                                        </div>
                                        
                                        <div class="flex items-center space-x-0.5">
                                            <p class="md:text-sm text-xs p-50 text-gray-700">
                                                一致度
                                            </p>
                                            <p class="p-50 text-gray-700 ml-1">
                                                <p class="md:text-sm text-xs p-50 text-gray-700"><span class="md:text-base text-sm text-red-500 rounded"> {{ number_format($dbsearch->rating, 1) }} </span> / 5.0</p>
                                            </p>
                                        </div>
                                            
                                        <!--上が終われば，詳細画面のデザイン→検索履歴のデザイン→再検索結果一覧→再検索詳細画面-->
                                        <!-- 苦味、酸味、コク、甘味、香りの表示部分 -->
                                        <div class="coffeeposts_evaluation mt-5">
                                            <!--<h3 class="md:text-lg text-base text-gray-700 font-bold mb-3">あなたの検索内容</h3>-->
                                            <div class="flex justify-start items-center space-x-2">
                                                <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 rounded">苦味</p><span class="md:text-sm text-xs"> {{ $dbsearch->bitter }} </span>
                                                <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</p><span class="md:text-sm text-xs"> {{ $dbsearch->acidity }} </span>
                                                <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</p><span class="md:text-sm text-xs"> {{ $dbsearch->rich }} </span>
                                                <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</p><span class="md:text-sm text-xs"> {{ $dbsearch->sweet }} </span>
                                                <p class="md:text-base text-sm bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</p><span class="md:text-sm text-xs"> {{ $dbsearch->smell }} </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- いいね機能 -->
                                    <div class="flex items-center space-x-2 text-sm ml-auto">
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
                                            {{ $dbsearch->likes->count() }}
                                        </div>
                                    </div>
                            
                        
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <div class="flex justify-center items-center mt-5">
                    <a href='/search/db' class="md:text-base text-sm flex justify-center items-center bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold md:px-4 md:py-2 px-2 py-1 border border-orange-300 rounded cursor-pointer no-underline">
                        検索に戻る
                    </a>
                </div>
            </div>
        </div>
        
        <script>
            // ポップアップに関する実装
            document.getElementById('show-popup').addEventListener('click', function() {
                document.getElementById('popup').classList.remove('hidden');
            });
            
            document.getElementById('close-popup').addEventListener('click', function() {
                document.getElementById('popup').classList.add('hidden');
            });
            
            // スライダーを無効化/有効化する関数
            function disableSliders(disabled) {
                const sliders = document.querySelectorAll('input[type="range"]');
                sliders.forEach(slider => {
                    slider.disabled = disabled;
                });
            }
            
            const setCurrentValue = (val) => {
                spanElement.innerText = val;
            
                // ポジションの計算
                const percent = ((val - inputElement.min) / (inputElement.max - inputElement.min)) * 100;
                spanElement.style.left = `calc(${percent}% - 10px)`;
                spanElement.style.top = '50%'; /* この行を追加 */
                spanElement.style.transform = 'translate(-50%, -50%)'; /* この行を変更 */
            };
        </script>
    </x-app-layout>
