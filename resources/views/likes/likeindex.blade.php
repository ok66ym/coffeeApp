<x-app-layout>
        <div class="pl-64 flex items-center justify-center h-screen">
            <div class="flex space-x-4">
                <!--いいねしたデータベース上のデータ一覧ページへ-->
                <div class="like_coffee">
                    <a href="/likes/coffees" class="text-2xl bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded no-underline">データベース上のデータ</a>
                </div>
                <!--いいねした投稿一覧ページへ-->
                <div class="like_post">
                    <a href="/likes/posts" class="text-2xl bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded no-underline">みんなの投稿</a>
                </div>
            </div>
        </div>
</x-app-layout>
