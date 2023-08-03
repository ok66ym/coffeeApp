<x-app-layout>
            <h1>投稿作成</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <!--コーヒーを5つの項目で評価-->
                <h2>コーヒーを評価</h2>
                <div class="bitter">
                    <h2>苦味</h2>
                    <input type="text" name="post[bitter]" placeholder="5" value="{{ old('post.bitter') }}"/>
                <p class="bitter_error" style="color:red">{{ $errors->first('post.bitter') }}</p>
                <div class="acidity">
                    <h2>酸味</h2>
                    <input type="text" name="post[acidity]" placeholder="2" value="{{ old('post.acidity') }}"/>
                </div>
                <p class="acidity_error" style="color:red">{{ $errors->first('post.acidity') }}</p>
                <div class="rich">
                    <h2>コク</h2>
                    <input type="text" name="post[rich]" placeholder="4" value="{{ old('post.rich') }}"/>
                </div>
                <p class="rich_error" style="color:red">{{ $errors->first('post.rich') }}</p>
                <div class="sweet">
                    <h2>甘味</h2>
                    <input type="text" name="post[sweet]" placeholder="3" value="{{ old('post.sweet') }}"/>
                </div> 
                <p class="sweet_error" style="color:red">{{ $errors->first('post.sweet') }}</p>
                <div class="smell">
                    <h2>香り</h2>
                    <input type="text" name="post[smell]" placeholder="5" value="{{ old('post.smell') }}"/>
                </div> 
                <p class="smell_error" style="color:red">{{ $errors->first('post.smell') }}</p>
                
                <!--投稿ボタンの実装-->
                <input type="submit" value="投稿"/>
            </form>
</x-app-layout>
