<x-app-layout>
    <div class="h-screen flex items-center justify-center pt-40 pb-40 mb-40">
        
        <div class="sm:space-x-4 space-x-1">
            <!--データベースの中からコーヒーを探すページへ-->
            <a href="/search/db" class="sm:text-1xl text-base bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 py-2 px-3 rounded cursor-pointer no-underline">コーヒーを探す</a>
            
            <!--みんなの投稿の中からコーヒーを探すページへ-->
            <a href="/search/posts" class="sm:text-1xl text-base bg-yellow-700 hover:bg-yellow-800 text-white font-bold sm:py-4 sm:px-6 py-2 px-3 rounded cursor-pointer no-underline">みんなの投稿から探す</a>
        </div>
            
    </div>
</x-app-layout>
