<x-app-layout>
        <div class="pt-20 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                <div class="flex flex-col justify-center items-center border border-orange-900 rounded p-8 w-3/5 md:w-1/2 lg:w-3/5 relative">
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <a href="/search/" class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            戻る
                        </a>
                    </div>
                    
                    <!--説明文のポップアップ-->
                    <!-- ポップアップボタン -->
                    <div class="flex justify-center mb-4">
                        <button id="show-popup" class="ml-8 px-8 py-2 bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold border border-orange-300 rounded cursor-pointer z-100">ヒント</button>
                    </div>
                
                    <!-- ポップアップの内容 -->
                    <div id="popup" class="fixed top-0 left-0 bg-black bg-opacity-50 hidden flex justify-center items-center mb-5 z-100 relative">
                        <div class="bg-yellow-100 border border-orange-900 p-8 rounded max-w-xl relative">
                            <p>
                                <b class="text-orange-900">コーヒーの検索について</b>
                                <br>
                                みんなが投稿したコーヒーの中から好みのコーヒーを検索することができます．<br>
                                それぞれの項目はコーヒーの特徴を表しています．<br>
                                <b class="text-orange-500">「1」</b>近づくにつれてその特徴は<b class="text-orange-500">弱く</b>，
                                <b class="text-orange-700">「5」</b>に近づくにつれてその特徴が<b class="text-orange-700">強く</b>現れたコーヒーとなります．
                                それぞれのツマミを動かして，好みのコーヒーの特徴を選択してください．
                            </p>
                            <div class="flex justify-center items-center">
                                <button id="close-popup" class="flex justify-center items-center p-4 border-0 focus:underline focus:text-white focus:text-black text-gray-700 rounded cursor-pointer ">×CLOSE</button>
                            </div>
                        </div>
                    </div>
                    
                    <form action="/search/posts/results" method="GET">
                        
                        <div class="flex items-center mt-8 mb-5">
                            <p class="mr-3 mb-6">苦味</p>
                            <div class="slider-container relative w-96">
                                <input type="range" id="postbitter" min="1" max="5" step="0.5" name="post[bitter]" value="{{ old('post.bitter', session('search_values.bitter', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 h-2 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-postbitter"></span>
                            </div>
                        </div>
                            
                        <div class="flex items-center mt-8 mb-5">
                            <p class="mr-3 mb-6">酸味</p>
                            <div class="slider-container relative w-96">
                                <input type="range" id="postacidity" min="1" max="5" step="0.5" name="post[acidity]" value="{{ old('post.acidity', session('search_values.acidity', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 h-2 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-postacidity"></span>
                            </div>
                        </div>
                        
                        <div class="flex items-center mt-8 mb-5">
                            <p class="mr-3 mb-6">コク</p>
                            <div class="slider-container relative w-96">
                                <input type="range" id="postrich" min="1" max="5" step="0.5" name="post[rich]" value="{{ old('post.rich', session('search_values.rich', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 h-2 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-postrich"></span>
                            </div>
                        </div>
                        
                        <div class="flex items-center mt-8 mb-5">
                            <p class="mr-3 mb-6">甘味</p>
                            <div class="slider-container relative w-96">
                                <input type="range" id="postsweet" min="1" max="5" step="0.5" name="post[sweet]" value="{{ old('post.sweet', session('search_values.sweet', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 h-2 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-postsweet"></span>
                            </div>
                        </div>
                        
                        <div class="flex items-center mt-8 mb-5">
                            <p class="mr-3 mb-6">香り</p>
                            <div class="slider-container relative w-96">
                                <input type="range" id="postsmell" min="1" max="5" step="0.5" name="post[smell]" value="{{ old('post.smell', session('search_values.smell', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 h-2 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-postsmell"></span>
                            </div>
                        </div>
                        
                        <!--検索ボタンの実装-->
                        <div class="flex justify-center pl-10">
                            <input class="bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-2 px-4 border border-orange-300 rounded cursor-pointer" type="submit" value="コーヒーを探す"/>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
            
            
        <script>
            // スライダーの数値をスライダーを動かすごとに位置と数値を変化するための実装
            window.onload = () => {
                const sliders = [
                    { inputId: 'postbitter', spanId: 'current-postbitter' },
                    { inputId: 'postacidity', spanId: 'current-postacidity' },
                    { inputId: 'postrich', spanId: 'current-postrich' },
                    { inputId: 'postsweet', spanId: 'current-postsweet' },
                    { inputId: 'postsmell', spanId: 'current-postsmell' },
                ];

                sliders.forEach((slider) => {
                    const inputElement = document.getElementById(slider.inputId);
                    const spanElement = document.getElementById(slider.spanId);

                    const setCurrentValue = (val) => {
                        spanElement.innerText = val;
            
                        // ポジションの計算
                        const percent = ((val - inputElement.min) / (inputElement.max - inputElement.min)) * 100;
                        spanElement.style.left = `calc(${percent}% - 10px)`;
                    };

                    const rangeOnChange = (e) => {
                        setCurrentValue(e.target.value);
                    };

                    inputElement.addEventListener('input', rangeOnChange);
                    setCurrentValue(inputElement.value);
                });
            }
            
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
