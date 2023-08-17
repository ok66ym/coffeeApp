<x-app-layout>
        <div class="pt-20 pb-40">
            <form action="/search/posts/results" method="GET">
                
                <div class="postsearch_bitter">
                    <h2>苦味</h2>
                    <input type="range" id="postbitter" min="1" max="5" step="0.5" name="post[bitter]" value="{{ old('post.bitter', session('search_values.bitter', 3)) }}"/>
                    <p><span id="current-postbitter"></span></p>
                </div>
                    
                <div class="postsearch_acidity">
                    <h2>酸味</h2>
                    <input type="range" id="postacidity" min="1" max="5" step="0.5" name="post[acidity]" value="{{ old('post.acidity', session('search_values.acidity', 3)) }}"/>
                    <p><span id="current-postacidity"></span></p>
                </div>
                
                <div class="postsearch_rich">
                    <h2>コク</h2>
                    <input type="range" id="postrich" min="1" max="5" step="0.5" name="post[rich]" value="{{ old('post.rich', session('search_values.rich', 3)) }}"/>
                    <p><span id="current-postrich"></span></p>
                </div>
                
                <div class="postsearch_sweet">
                    <h2>甘味</h2>
                    <input type="range" id="postsweet" min="1" max="5" step="0.5" name="post[sweet]" value="{{ old('post.sweet', session('search_values.sweet', 3)) }}"/>
                    <p><span id="current-postsweet"></span></p>
                </div>
                
                <div class="postsearch_smell">
                    <h2>香り</h2>
                    <input type="range" id="postsmell" min="1" max="5" step="0.5" name="post[smell]" value="{{ old('post.smell', session('search_values.smell', 3)) }}"/>
                    <p><span id="current-postsmell"></span></p>
                </div>
                
                <!--検索ボタンの実装-->
                <input type="submit" value="検索"/>
            </form>
        </div>
            
            
        <script>
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
                    };
                
                    const rangeOnChange = (e) => {
                        setCurrentValue(e.target.value);
                    };
                
                    inputElement.addEventListener('input', rangeOnChange);
                    setCurrentValue(inputElement.value);
                });
            }
            </script>
</x-app-layout>
