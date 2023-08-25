<x-app-layout>
    <div class="pt-20 pb-40">
        <div class="flex flex-col justify-center items-center">
            <!--認証済みのuser表示-->
            <p class="sm:text-3xl text-base text-gray-900 p-2">{{ Auth::user() -> name }} </p>
            
            <div class="sm:text-2xl text-sm text-gray-900 sm:p-2">
                {{ Auth::user() -> myinfo }}
            </div>
        </div>
        
        <div class="border border-gray-500 p-50 m-15 flex justify-center space-x-4 p-2">
            <!--投稿一覧へ-->
            <a href="/likes/coffees" class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline">コーヒー</a>
            <!--いいね一覧へ-->
            <a href="/likes/posts" class="sm:text-1xl text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 px-4 py-2 rounded cursor-pointer no-underline">みんなの投稿</a>
        </div>
    </div>
</x-app-layout>
