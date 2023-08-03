<x-app-layout>
            <form action="/search/db/results" method="GET">
                
                <div class="dbsearch_bitter">
                    <h2>苦味</h2>
                    <input type="range" id="dbbitter" min="0" max="5" step="0.5" name="post[bitter]" value="0"/>
                    <p><span id="current-dbbitter"></span></p>
                </div>
                    
                <div class="dbsearch_acidity">
                    <h2>酸味</h2>
                    <input type="range" id="dbacidity" min="0" max="5" step="0.5" name="post[acidity]" value="0"/>
                    <p><span id="current-dbacidity"></span></p>
                </div>
                
                <div class="dbsearch_rich">
                    <h2>コク</h2>
                    <input type="range" id="dbrich" min="0" max="5" step="0.5" name="post[rich]" value="0"/>
                    <p><span id="current-dbrich"></span></p>
                </div>
                
                <div class="dbsearch_sweet">
                    <h2>甘味</h2>
                    <input type="range" id="dbsweet" min="0" max="5" step="0.5" name="post[sweet]" value="0"/>
                    <p><span id="current-dbsweet"></span></p>
                </div>
                
                <div class="dbsearch_smell">
                    <h2>香り</h2>
                    <input type="range" id="dbsmell" min="0" max="5" step="0.5" name="post[smell]" value="0"/>
                    <p><span id="current-dbsmell"></span></p>
                </div>
                
                <!--検索ボタンの実装-->
                <input type="submit" value="検索"/>
            </form>
            
            
            <script>
                window.onload = () => {
                    const sliders = [
                        { inputId: 'dbbitter', spanId: 'current-dbbitter' },
                        { inputId: 'dbacidity', spanId: 'current-dbacidity' },
                        { inputId: 'dbrich', spanId: 'current-dbrich' },
                        { inputId: 'dbsweet', spanId: 'current-dbsweet' },
                        { inputId: 'dbsmell', spanId: 'current-dbsmell' },
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
