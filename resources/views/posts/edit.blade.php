<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <h1>投稿編集</h1>
            <div class="posts">
                <form action='/posts/{{ $post->id }}' method="POST">
                    @csrf
                    @method('PUT')
                    <!--コーヒー名を記録-->
                    <div class="posts_coffeeName">
                        <h2>コーヒー名</h2>
                        <input type="text" name="post[name]" value="{{ $post->name }}"/>
                    </div>
                    <p class="name_error" style="color:red">{{ $errors->first('post.name') }}</p>
                    
                    <!--コーヒー種名を記録-->
                    <div class="posts_speciesName">
                        <h2>コーヒー種名</h2>
                        <input type="text" name="post[species_name]" value="{{ $post->species_name }}"/>
                    </div>
                    <p class="species_name_error" style="color:red">{{ $errors->first('post.species_name') }}</p>
                    
                    <!--コーヒーの産地を記録-->
                    <div class="posts_areaName">
                        <h2>産地</h2>
                        <input type="text" name="post[area_name]" value="{{ $post->area_name }}"/>
                    </div>
                    <p class="area_name_error" style="color:red">{{ $errors->first('post.area_name') }}</p>
                    
                    <!--販売・購入店を記録-->
                    <div class="posts_shopName">
                        <h2>販売店</h2>
                        <input type="text" name="post[shop_name]" value="{{ $post->shop_name }}"/>
                    </div>
                    <p class="shop_name_error" style="color:red">{{ $errors->first('post.shop_name') }}</p>
                    
                    <!--コーヒー販売元のurlを記録-->
                    <div class="posts_shopURL">
                        <h2>販売元URL</h2>
                        <input type="text" name="post[shop_url]" value="{{ $post->shop_url }}"/>
                    </div>
                    <p class="ship_url_error" style="color:red">{{ $errors->first('post.shop_url') }}</p>
                    
                    <!--コーヒーを5つの項目で評価-->
                    <div class="evaluation_coffeeposts">
                        <h2>コーヒーを評価</h2>
                        
                        <div class="posts_bitter">
                            <h2>苦味</h2>
                            <input type="text" name="post[bitter]" value="{{ $post->bitter }}"/>
                        <p class="bitter_error" style="color:red">{{ $errors->first('post.bitter') }}</p>
                        
                        <div class="posts_acidity">
                            <h2>酸味</h2>
                            <input type="text" name="post[acidity]" value="{{ $post->acidity }}"/>
                        </div>
                        <p class="acidity_error" style="color:red">{{ $errors->first('post.acidity') }}</p>
                        
                        <div class="posts_rich">
                            <h2>コク</h2>
                            <input type="text" name="post[rich]" value="{{ $post->rich }}"/>
                        </div>
                        <p class="rich_error" style="color:red">{{ $errors->first('post.rich') }}</p>
                        
                        <div class="posts_sweet">
                            <h2>甘味</h2>
                            <input type="text" name="post[sweet]" value="{{ $post->sweet }}"/>
                        </div> 
                        <p class="sweet_error" style="color:red">{{ $errors->first('post.sweet') }}</p>
                        
                        <div class="posts_smell">
                            <h2>香り</h2>
                            <input type="text" name="post[smell]" value="{{ $post->smell }}"/>
                        </div> 
                        <p class="smell_error" style="color:red">{{ $errors->first('post.smell') }}</p>
                    </div>
                    
                    <!--コーヒー豆の焙煎度を記録-->
                    <div class="posts_roasted">
                        <h2>焙煎度</h2>
                        <input type="text" name="post[roasted]" value="{{ $post->roasted }}"/>
                    </div> 
                    <p class="roasted_error" style="color:red">{{ $errors->first('post.roasted') }}</p>
                    
                    <!--投稿するコーヒーについての説明-->
                    <div class="posts_body">
                        <h2>コーヒーについて</h2>
                        <textarea name="post[explanation]">{{ $post->explanation }}</textarea>
                    </div>
                    <p class="explanation_error" style="color:red">{{ $errors->first('post.explanation') }}</p>
                    
                    <!--投稿ボタンの実装-->
                    <input type="submit" value="更新"/>
                </form>
            </div>
            
            <div class="footer">
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>
