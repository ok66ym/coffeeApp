<x-app-layout>
    <div class="h-screen flex items-center justify-center pt-80 pb-40 mb-40">
        
        <div class="space-x-4">
            <!--データベースの中からコーヒーを探すページへ-->
            <a href="/search/db" class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline">コーヒーを探す</a>
            
            <!--みんなの投稿の中からコーヒーを探すページへ-->
            <a href="/search/posts" class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline">みんなの投稿から探す</a>
        </div>
            
    </div>
</x-app-layout>
