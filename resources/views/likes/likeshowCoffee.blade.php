<x-app-layout>
        <div class="pt-10 pb-40">
            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100">
                    
                <div class="flex flex-col justify-center items-center border border-orange-900 relative rounded p-8 w-4/5 md:w-1/2 lg:w-2/3">
                    
                    <div class="absolute top-0 left-0 mt-2 ml-2">
                        <a href="/likes/coffees" class="text-1xl bg-orange-300 text-gray-800 hover:text-black hover:bg-orange-400 focus:border-orange-400 font-bold py-1 px-4 border border-orange-300 rounded cursor-pointer no-underline">
                            戻る
                        </a>
                    </div>
                    
                    <!--投稿情報-->
                    <!--画像表示-->
                    <!--@if($coffee->image)-->
                    <!--<div class='post_image'>-->
                    <!--    <img src="{{ $coffee->image }}" alt="画像が読み込めません。" class="w-80 h-80 object-cover"/>-->
                    <!--</div>-->
                    <!--@else-->
                    <!--<div class="p-5 flex-grow flex justify-center items-center">-->
                    <!--    <p>No Image</p>-->
                    <!--</div>-->
                    <!--@endif-->
                    
                    <!-- コーヒー名、いいねボタン、いいねの数 -->
                    <div class="flex items-center space-x-4">
                        <h2 class="text-gray-700">
                            {{ $coffee->name }}
                        </h2>
                        <!-- いいね機能 -->
                        @if(Auth::user()->likesCoffees->contains($coffee->id))
                            <!--いいね状態-->
                            <a href="{{ route('unlikeCoffee', $coffee) }}" class="btn btn-link btn-sm">
                                <i class="fas fa-heart fa-2x text-danger" style="color: red;"></i>
                            </a>
                        @else
                            <!--いいねしていない状態-->
                            <a href="{{ route('likeCoffee', $coffee) }}" class="btn btn-link btn-sm">
                                <i class="far fa-heart fa-2x text-secondary" style="color: red;"></i>
                            </a>
                        @endif
                        
                        <!-- いいねの数 -->
                        <div class="like_counte">
                            {{ $coffee->likes->count() }}
                        </div>
                    </div>
                    
                    @if($coffee->species_name)
                    <h3 class="species_name">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> {{ $coffee->species_name }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">種名</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    @if($coffee->area_name)
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> {{$coffee->area_name}}<br><br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">産地</span> <span class="text-gray-400">情報なし</span><br><br>
                    </h3>
                    @endif
                    
                    @if($coffee->roasted)
                    <h3 class="roasted">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-3">焙煎度</span> {{ $coffee->roasted }}<br>
                    </h3>
                    @else
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">焙煎度</span> <span class="text-gray-400">情報なし</span><br>
                    </h3>
                    @endif
                    
                    <h3 class="coffeeposts_evaluation">
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span> {{ $coffee->bitter}} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">酸味</span> {{ $coffee->acidity }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">コク</span> {{ $coffee->rich }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">甘味</span> {{ $coffee->sweet }} &nbsp 
                        <span class="bg-orange-300 text-gray-700 px-1 rounded">香り</span> {{ $coffee->smell }} <br><br>
                    </h3>
                    
                    <h3>
                        <span class="bg-orange-300 text-gray-700 px-1 rounded md-2">販売店</span>
                        @if($coffee->shop_url)
                            <a class="text-black hover:text-gray-600 hover:bg-orange-400 no-underline rounded ursor-pointer" href="{{ $coffee->shop_url }}" target="_blank">{{ $coffee->shop_name }}(販売サイトへ)</a>
                        @else
                            {{ $coffee->shop_name }}
                        @endif
                    </h3>
                    
                </div>
            </div>
        </div>
                
        <script>
        </script>
</x-app-layout>
