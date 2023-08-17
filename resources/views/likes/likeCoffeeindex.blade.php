<x-app-layout>
    <div class="mt-20 mb-40">
                <!--認証済みのuser表示-->
        <p class="text-3xl font-bold p-5">ユーザー：{{ Auth::user() -> name }} </p>
        
        <div class="text-2xl p-10">
            <p>いいね数：{{ $likesCoffees->count() }}</p>
        </div>
        
        <div class="text-2xl p-10">
            <p>一言</p>
        </div>
        
        <div class="border border-black p-50 m-15 flex justify-center space-x-4 p-2">
            <!--投稿一覧へ-->
            <!--<a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/">投稿</a>-->
            <a class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline" href="/">投稿</a>
            <!--いいね一覧へ-->
            <!--<a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/likes">いいね</a>-->
            <a class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline" href="/likes">いいね</a>
        </div>
            
        <!--いいねし投稿・データを表示-->
        <div class='posts flex flex-wrap'>
            @foreach ($likesCoffees as $coffee)
                <div class="p-15 border border-black w-1/3 flex flex-col justify-center">
                    <!--画像表示-->
                    @if($coffee->coffee->image)
                    <div class='p-5 flex-grow flex justify-center items-center'>
                        <img src="{{ $coffee->coffee->image }}" alt="画像が読み込めません。"/>
                    </div>
                    @else
                    <div class="p-5 flex-grow flex justify-center items-center">
                       <p>No Image</p>
                    </div>
                    @endif
                        
                    <!--コーヒー名表示-->
                    <h2 class='flex justify-center mb-5'>
                        <a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href={{ route('likes.likeshowCoffee', ['coffee' => $coffee->coffee_id]) }}>{{ $coffee->coffee->name }}</a>
                    </h2>
                        
                    <!--コーヒーの評価項目表示-->
                    <div class='pb-10 flex justify-center'>
                        苦味：{{ $coffee->coffee->bitter }} &nbsp 酸味：{{ $coffee->coffee->acidity }} &nbsp コク：{{ $coffee->coffee->rich }} &nbsp 甘味：{{ $coffee->coffee->sweet }} &nbsp 香り：{{ $coffee->coffee->smell }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="likepost_pagination">
            {{ $likesCoffees->links() }}
        </div>
    </div>
</x-app-layout>
