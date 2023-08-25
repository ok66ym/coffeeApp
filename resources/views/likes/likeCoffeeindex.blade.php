<x-app-layout>
    <div class="mt-20 mb-40">
        <div class="flex flex-col justify-center items-center">
                    <!--認証済みのuser表示-->
            <p class="sm:text-3xl text-base text-gray-900 p-2">{{ Auth::user() -> name }} </p>
            
            <div class="sm:text-2xl text-sm sm:p^5 p-2">
                <p>いいね数：<span class="sm:text-2xl text-sm text-orange-700">{{ $likesCoffees->count() }}</span></p>
            </div>
            
            <div class="sm:text-2xl text-sm text-gray-900 sm:p-2">
                {{ Auth::user() -> myinfo }}
            </div>
        </div>
        
        <div class="border border-gray-500 p-50 m-15 flex justify-center space-x-4 p-2">
            <!--投稿一覧へ-->
            <a class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline" href="/">投稿</a>
            <!--いいね一覧へ-->
            <a class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline" href="/likes">いいね</a>
        </div>
            
        <!--いいねし投稿・データを表示-->
        <div class='posts flex flex-wrap'>
            @foreach ($likesCoffees as $coffee)
                <div class="p-15 border border-gray-500 sm:w-1/3 w-1/2 flex flex-col justify-center">
                        
                    <!--コーヒー名表示-->
                    <h2 class=' p-5 flex justify-center mt-5 mb-5'>
                        <a class="md:text-2xl text-base p-50 text-gray-700 font-bold hover:text-orange-700 transition rouded duration-300 no-underline" href={{ route('likes.likeshowCoffee', ['coffee' => $coffee->coffee_id]) }}>{{ $coffee->coffee->name }}</a>
                    </h2>
                        
                    <!--コーヒーの評価項目表示-->
                    <div class='md:text-xl text-xs pb-10 flex justify-center flex-wrap'>
                        苦味：{{ $coffee->coffee->bitter }} &nbsp 
                        酸味：{{ $coffee->coffee->acidity }} 
                        <span class='xl:inline hidden'>&nbsp</span> <!-- xl以上でスペースを表示 -->
                        <span class='xl:hidden block'></span> <!-- xl未満で改行を挿入 -->
                        コク：{{ $coffee->coffee->rich }} &nbsp 
                        甘味：{{ $coffee->coffee->sweet }} &nbsp 
                        香り：{{ $coffee->coffee->smell }}
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $likesCoffees->links('paginator.custom') }}
        </div>
    </div>
</x-app-layout>
