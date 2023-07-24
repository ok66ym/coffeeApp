<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿作成</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <h1>投稿作成</h1>
            <form action='/posts' method="POST">
                @csrf
                
                <!--コーヒー名を記録-->
                <div class="coffeeName">
                    <h2>コーヒー名</h2>
                    <input type="text" name="post[name]" placeholder="ブルーマウンテン" value="{{ old('post.name') }}"/>
                </div>
                <p class="name_error" style="color:red">{{ $errors->first('post.name') }}</p>
                
                <!--コーヒー種名を記録-->
                <div class="speciesName">
                    <h2>コーヒー種名</h2>
                    <input type="text" name="post[species_name]" placeholder="ブルーマウンテン" value="{{ old('post.specoes_name') }}"/>
                </div>
                <p class="species_name_error" style="color:red">{{ $errors->first('post.species_name') }}</p>
                
                <!--コーヒーの産地を記録-->
                <div class="areaName">
                    <h2>産地</h2>
                    <input type="text" name="post[area_name]" placeholder="ブラジル" value="{{ old('post.area_name') }}"/>
                </div>
                <p class="area_name_error" style="color:red">{{ $errors->first('post.area_name') }}</p>
                
                <!--販売・購入店を記録-->
                <div class="shopName">
                    <h2>販売店</h2>
                    <input type="text" name="post[shop_name]" placeholder="コーヒー購入店" value="{{ old('post.shop_name') }}"/>
                </div>
                <p class="shop_name_error" style="color:red">{{ $errors->first('post.shop_name') }}</p>
                
                <!--コーヒー販売元のurlを記録-->
                <div class="shopURL">
                    <h2>販売元URL</h2>
                    <input type="text" name="post[shop_url]" placeholder="販売店のURL https://~~~" value="{{ old('post.shop_url') }}"/>
                </div>
                <p class="ship_url_error" style="color:red">{{ $errors->first('post.shop_url') }}</p>
                
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
                
                <!--コーヒー豆の焙煎度を記録-->
                <div class="roasted">
                    <h2>焙煎度</h2>
                    <input type="text" name="post[roasted]" placeholder="6" value="{{ old('post.roasted') }}"/>
                </div> 
                <p class="roasted_error" style="color:red">{{ $errors->first('post.roasted') }}</p>
                
                <!--投稿するコーヒーについての説明-->
                <div class="body">
                    <h2>説明</h2>
                    <textarea name="post[explanation]" placeholder="苦味が強く，香りが特徴的なコーヒー．" value="{{old('post.explanation')}}"></textarea>
                </div>
                <p class="explanation_error" style="color:red">{{ $errors->first('post.explanation') }}</p>
                
                <!--投稿ボタンの実装-->
                <input type="submit" value="投稿"/>
            </form>
            
            <div class="footer">
                <a href="/">トップページへ</a>
            </div>
        </body>
    </x-app-layout>
</html>
