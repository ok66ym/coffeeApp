<x-app-layout>
        <div class="pt-20 pb-40">
                    
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 rounded lg:p-8 lg:w-3/5 p-2 w-11/12">
                    <!--説明文のポップアップ-->
                    <!-- ポップアップボタン -->
                    <div class="flex justify-center mb-4">
                        <button id="show-popup" class="lg:text-base text-sm px-4 py-2 bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold border border-orange-300 rounded cursor-pointer z-100">投稿について</button>
                    </div>
                
                    <!-- ポップアップの内容 -->
                    <div id="popup" class="fixed top-0 left-0 bg-black bg-opacity-50 hidden flex justify-center items-center mb-5 z-100 relative">
                        <div class="bg-yellow-100 border border-orange-900 p-8 rounded max-w-xl relative">
                            <p class="lg:text-base text-sm">
                                <b class="text-orange-900">必須事項</b>
                                <br>
                                ・コーヒー名：コーヒ豆の名前やコーヒーの名前<br>
                                ・販売店：投稿するコーヒーを購入した<b class="text-orange-500">店舗</b>や<b class="text-orange-500">サイト</b>の名前<br>
                                ・評価項目：苦味・酸味・コク・甘味・香りをそれぞれ<b class="text-orange-500">5段階評価</b>(デフォルトは"3")<br>
                                ・コーヒーについての説明<br><br>
                                
                                <b class="text-orange-900">任意事項</b>
                                <br>
                                ・種名<br>
                                ・産地<br>
                                ・焙煎度<br>
                                ・販売元のURL(公式サイトなど)<br>
                                ・写真<br>
                            </p>
                            <div class="flex justify-center items-center">
                                <button id="close-popup" class="flex justify-center items-center p-4 border-0 focus:underline focus:text-white focus:text-black text-gray-700 rounded cursor-pointer lg:text-sm text-xs">×CLOSE</button>
                            </div>
                        </div>
                    </div>
                    
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <!--コーヒー名を記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class ="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[name]" placeholder="コーヒー名" value="{{ old('post.name') }}"/>
                        </div>
                        <p class="name_error" style="color:red">{{ $errors->first('post.name') }}</p>
                        
                        <!--コーヒー種名を記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class ="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[species_name]" placeholder="コーヒー種名" value="{{ old('post.specoes_name') }}"/>
                        </div>
                        <p class="species_name_error" style="color:red">{{ $errors->first('post.species_name') }}</p>
                        
                        <!--コーヒーの産地を記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class ="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[area_name]" placeholder="産地" value="{{ old('post.area_name') }}"/>
                        </div>
                        <p class="area_name_error" style="color:red">{{ $errors->first('post.area_name') }}</p>
                        
                        <!--販売・購入店を記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class ="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[shop_name]" placeholder="販売店" value="{{ old('post.shop_name') }}"/>
                        </div>
                        <p class="shop_name_error" style="color:red">{{ $errors->first('post.shop_name') }}</p>
                        
                        <!--コーヒー販売元のurlを記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class ="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-90 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[shop_url]" placeholder="販売元URL https://~~~" value="{{ old('post.shop_url') }}"/>
                        </div>
                        <p class="ship_url_error" style="color:red">{{ $errors->first('post.shop_url') }}</p>
                        
                        <!--コーヒーを5つの項目で評価-->
                        <div class="flex items-center justify-center mt-8 mb-5">
                            <p class="lg:text-base text-sm mr-3 mb-6">苦味</p>
                            <div class="slider-container relative lg:w-96 w-60 lg:text-base text-sm">
                                <input type="range" id="postbitter" min="1" max="5" step="0.5" name="post[bitter]" value="{{ old('post.bitter', session('post_values.bitter', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 lg:h-2 h-1 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-bitter"></span>
                            </div>
                        </div>
                            <p class="bitter_error" style="color:red">{{ $errors->first('post.bitter') }}</p>
                        
                        <div class="flex items-center justify-center mt-7 mb-5">
                            <p class="lg:text-base text-sm mr-3 mb-6">酸味</p>
                            <div class="slider-container relative lg:w-96 w-60 lg:text-base text-sm">
                                <input type="range" id="postacidity" min="1" max="5" step="0.5" name="post[acidity]" value="{{ old('post.acidity', session('post_values.acidity', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 lg:h-2 h-1 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-acidity"></span>
                            </div>
                        </div>
                            <p class="acidity_error" style="color:red">{{ $errors->first('post.acidity') }}</p>
                            
                        <div class="flex items-center justify-center mt-7 mb-5">
                            <p class="lg:text-base text-sm mr-3 mb-6">コク</p>
                            <div class="slider-container relative lg:w-96 w-60 lg:text-base text-sm">
                                <input type="range" id="postrich" min="1" max="5" step="0.5" name="post[rich]" value="{{ old('post.rich', session('post_values.rich', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 lg:h-2 h-1 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-rich"></span>
                            </div>
                        </div>
                        <p class="rich_error" style="color:red">{{ $errors->first('post.rich') }}</p>
                        
                        <div class="flex items-center justify-center mt-7 mb-5">
                            <p class="lg:text-base text-sm mr-3 mb-6">甘味</p>
                            <div class="slider-container relative lg:w-96 w-60 lg:text-base text-sm">
                                <input type="range" id="postsweet" min="1" max="5" step="0.5" name="post[sweet]" value="{{ old('post.sweet', session('post_values.sweet', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 lg:h-2 h-1 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-sweet"></span>
                            </div>
                        </div>
                        <p class="rich_error" style="color:red">{{ $errors->first('post.rich') }}</p>
                        
                        <div class="flex items-center justify-center mt-7 mb-5">
                            <p class="lg:text-base text-sm mr-3 mb-6">香り</p>
                            <div class="slider-container relative lg:w-96 w-60 lg:text-base text-sm">
                                <input type="range" id="postsmell" min="1" max="5" step="0.5" name="post[smell]" value="{{ old('post.smell', session('post_values.smell', 3)) }}" class="shadow-autofill focus:ring-2 focus:ring-orange-900 bg-orange-100 w-80 lg:h-2 h-1 rounded-full">
                                <span class="slider-value absolute bottom-4 left-1/2" id="current-smell"></span>
                            </div>
                        </div> 
                        <p class="smell_error" style="color:red">{{ $errors->first('post.smell') }}</p>
                        
                        <!--コーヒー豆の焙煎度を記録-->
                        <div class="flex items-center justify-center mb-4">
                            <input class= "shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:text-base text-sm" type="text" name="post[roasted]" placeholder="焙煎度" value="{{ old('post.roasted') }}"/>
                        </div> 
                        <p class="roasted_error" style="color:red">{{ $errors->first('post.roasted') }}</p>
                        
                        <!--投稿するコーヒーについての説明-->
                        <div class="flex items-center justify-center mb-4">
                            <textarea class="shadow-autofill focus:ring-2 focus:ring-orange-900 focus:border-orange-900 bg-orange-100 border-0 border-b border-orange-800 lg:mr-4 lg:w-96 w-60 lg:h-40 h-20 lg:text-base text-sm" name="post[explanation]" placeholder="コーヒーについて">{{old('post.explanation')}}</textarea>
                        </div>
                        <p class="explanation_error" style="color:red">{{ $errors->first('post.explanation') }}</p>
                        
                        <!--画像投稿機能実装-->
                        <div class="flex items-center justify-center mb-4 space-x-4">
                            <div class="flex flex-col items-center space-y-4"> <!-- 縦に並べる部分をflex-colで囲む -->
                                <label for="image-upload" class="bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold lg:py-2 lg:px-4 lg:text-sm text-xs border border-orange-300 rounded cursor-pointer">
                                    写真を選択
                                </label>
                                <input id="image-upload" type="file" name="image" class="hidden">
                                <button id="remove-image" type="button" class="text-black hover:underline hidden lg:text-sm text-xs">写真を削除</button>
                            </div>
                            <div id="image-preview" class="lg:w-64 lg:h-64 w-40 h-40 border border-orange-900 relative mb-4"></div> <!-- 画像のプレビュー部分 -->
                        </div>
                        
                        <div class="flex justify-end">
                            <!--投稿ボタンの実装-->
                            <input class="lg:text-base text-sm bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-2 px-4 border border-orange-300 rounded cursor-pointer" type="submit" value="保存"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            // スライダーの数値をスライダーを動かすごとに位置と数値を変化するための実装
            window.onload = () => {
                const sliders = [
                    { inputId: 'postbitter', spanId: 'current-bitter' },
                    { inputId: 'postacidity', spanId: 'current-acidity' },
                    { inputId: 'postrich', spanId: 'current-rich' },
                    { inputId: 'postsweet', spanId: 'current-sweet' },
                    { inputId: 'postsmell', spanId: 'current-smell' },
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
            
            /// アップロードした画像をプレビューする
            document.getElementById('image-upload').addEventListener('change', function (e) {
                const file = e.target.files[0];
                const removeImageButton = document.getElementById('remove-image');
                const previewContainer = document.getElementById('image-preview');
                
                if (file && file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.classList.add('w-full', 'h-full', 'object-cover'); // Tailwind CSSのクラスを追加
                        previewContainer.innerHTML = ''; // 既存のプレビューを削除
                        previewContainer.appendChild(img);
                        removeImageButton.classList.remove('hidden'); // ボタンを表示
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.innerHTML = ''; // Clear the preview area
                    removeImageButton.classList.add('hidden'); // 有効な画像がない場合、ボタンを非表示
                }
            });
            
            // プレビューした画像を削除する動作
            document.getElementById('remove-image').addEventListener('click', function() {
                document.getElementById('image-upload').value = ''; // Reset file input
                document.getElementById('image-preview').innerHTML = ''; // Clear the preview area
                this.classList.add('hidden'); // ボタンを非表示
            });
            
            // ポップアップに関する実装
            document.getElementById('show-popup').addEventListener('click', function() {
                document.getElementById('popup').classList.remove('hidden');
            });
            
            document.getElementById('close-popup').addEventListener('click', function() {
                document.getElementById('popup').classList.add('hidden');
            });
            
        </script>
</x-app-layout>
