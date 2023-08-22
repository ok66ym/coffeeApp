<x-app-layout>
    <div class="pt-20 pb-40">
        <div class="flex flex-col justify-center items-center">
            <!--認証済みのuser表示-->
            <p class="text-3xl text-gray-900 p-2">{{ Auth::user() -> name }} </p>
            
            <div class="text-2xl text-gray-900 p-5">
                {{ Auth::user() -> myinfo }}
            </div>
        </div>
        
        <div class="border border-black p-50 m-15 flex justify-center space-x-4 p-2">
            <!--投稿一覧へ-->
            <!--<a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/">投稿</a>-->
            <a href="/likes/coffees" class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline">コーヒー</a>
            <!--いいね一覧へ-->
            <!--<a class="p-50 text-orange-500 font-bold hover:text-orange-700 transition duration-300 no-underline" href="/likes">いいね</a>-->
            <a href="/likes/posts" class="text-1xl bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-4 px-6 rounded cursor-pointer no-underline">みんなの投稿</a>
        </div>
        <!--<div class="pt-5 flex items-center justify-center h-screen">-->
        <!--    <div class="flex space-x-4">-->
                <!--いいねしたデータベース上のデータ一覧ページへ-->
        <!--        <div class="like_coffee">-->
        <!--            <a href="/likes/coffees" class="text-2xl bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded no-underline">データベース上のデータ</a>-->
        <!--        </div>-->
                <!--いいねした投稿一覧ページへ-->
        <!--        <div class="like_post">-->
        <!--            <a href="/likes/posts" class="text-2xl bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded no-underline">みんなの投稿</a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</x-app-layout>
