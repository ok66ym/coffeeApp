    <x-app-layout>
        <div class="pt-20 pb-40">

            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100 relative w-full">
                <!--投稿結果を表示-->
                <h1 class="flex justify-center mt-5 ml-5 border-b-4 border-orange-800 w-96 text-gray-700">
                    検索結果一覧
                </h1>
                
                <div class="coffeeposts_evaluation mt-5">
                    <h3 class="text-gray-700 font-bold mb-3">あなたの検索内容</h3>
                    <div class="flex items-center space-x-4">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span> {{ $dbsearchInfo['bitter'] }}
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</span> {{ $dbsearchInfo['acidity'] }}
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</span> {{ $dbsearchInfo['rich'] }} 
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</span> {{ $dbsearchInfo['sweet'] }} 
                        <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</span> {{ $dbsearchInfo['smell'] }}
                    </div>
                </div>
                
                <!--説明文のポップアップ-->
                    <!-- ポップアップボタン -->
                    <div class="flex justify-center mt-3">
                        <button id="show-popup" class="text-xs ml-8 px-4 py-2 bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold border border-orange-300 rounded cursor-pointer z-100">一致度について</button>
                    </div>
                
                    <!-- ポップアップの内容 -->
                    <div id="popup" class="fixed top-0 left-0 bg-black bg-opacity-50 hidden flex justify-center items-center mb-5 z-100 relative">
                        <div class="bg-yellow-100 border border-orange-900 p-8 rounded max-w-xl relative">
                            <p>
                                一致度は，<b class="text-orange-700">検索した数値の合計</b>と<b class="text-orange-700">検索結果の数値の合計</b>との比率を計算しています．<br>
                                ※検索内容と一致していなくても一致度が高い場合があります．
                                
                            </p>
                            <div class="flex justify-center items-center">
                                <button id="close-popup" class="flex justify-center items-center p-4 border-0 focus:underline focus:text-white focus:text-black text-gray-700 rounded cursor-pointer ">×CLOSE</button>
                            </div>
                        </div>
                    </div>
                
                <div class="font-bold text-base mt-5 mb-10 w-2/3">
                    @if($dbsearches->isEmpty())
                        <div class="flex justify-center items-center h-full mt-10">
                            <p class="text-gray-700 text-center">
                                コーヒーが見つかりませんでした...
                            </p>
                        </div>
                    @else
                        <div class='border-orange-300 flex flex-col justify-center items-center'>
                            @foreach ($dbsearches as $dbsearch)
                                <div class="border-t border-b border-orange-300 py-3 flex justify-between items-center w-2/3">
                                    <div>
                                        <!-- コーヒー名を表示 -->
                                        <div class='db_name'>
                                            <h2 class='flex justify-beween items-center'>
                                                <a class="text-base p-50 text-gray-700 font-bold hover:text-orange-700 rounded transition duration-300 no-underline mr-3" href="{{ route('searches.dbshow', $dbsearch->id) }}" >{{ $dbsearch->name }}</a>
                                            </h2>
                                        </div>
                                        
                                        <div class="flex items-center space-x-0.5">
                                            <p class="text-sm p-50 text-gray-700">
                                                一致度
                                            </p>
                                            <p class="text-sm p-50 text-gray-700 ml-1">
                                                <p class="text-sm p-50 text-gray-700"><span class="text-base text-red-500 rounded"> {{ number_format($dbsearch->rating, 1) }} </span> / 5.0</p>
                                            </p>
                                        </div>
                                            
                                        <!-- 苦味、酸味、コク、甘味、香りの表示部分 -->
                                        <div class="flex items-center space-x-4 mt-2 text-sm">
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span> {{ $dbsearch->bitter }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">酸味</span> {{ $dbsearch->acidity }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">コク</span> {{ $dbsearch->rich }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">甘味</span> {{ $dbsearch->sweet }}
                                            <span class="bg-orange-300 text-gray-700 px-1 mr-2 rounded">香り</span> {{ $dbsearch->smell }}
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
                    <a href='/search/db' class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
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
