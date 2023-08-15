    <x-app-layout>
        <div class="pl-64">
            <!--投稿結果を表示-->
            <h1>検索履歴一覧</h1>
            
                <form action="{{ route('histories.alldelete') }}" method="POST">
                @csrf   
                @method('DELETE')
                <button type="button" onclick="deleteAllPosts()">全ての検索履歴を削除</button>
                </form>

                @foreach ($searchstores as $searchstore)
                
                    <div class="searchHistory_created">
                        {{ $searchstore->created_at }}
                    </div>
                
                    <div class="searchHistory_index">
                        苦味：{{ $searchstore['bitter'] }} &nbsp 酸味：{{ $searchstore['acidity'] }} &nbsp コク：{{ $searchstore['rich'] }} &nbsp 甘味：{{ $searchstore['sweet'] }} &nbsp 香り：{{ $searchstore['smell'] }}<br><br>
                    </div>
                    
                     <a href="{{ route('search.redbresults', ['bitter' => $searchstore->bitter, 'acidity' => $searchstore->acidity, 'rich' => $searchstore->rich, 'sweet' => $searchstore->sweet, 'smell' => $searchstore->smell]) }}" class="btn btn-primary">データベースの中から再検索<br><br></a>
                     <a href="{{ route('search.repostresults', ['bitter' => $searchstore->bitter, 'acidity' => $searchstore->acidity, 'rich' => $searchstore->rich, 'sweet' => $searchstore->sweet, 'smell' => $searchstore->smell]) }}" class="btn btn-primary">みんなの投稿から再検索</a>
                    
                    <!--検索履歴削除ボタン-->
                    <form action="/histories/{{ $searchstore->id }}" id="form_{{ $searchstore->id }}" method="post">
                         @csrf
                         @method('DELETE')
                        <button type="button" onclick="deletePost({{ $searchstore->id }})">削除<br><br></button>
                    </form>
                    
                @endforeach
                
                <div class="searchstore_pagination">
                    {{ $searchstores->links() }}
                </div>
        </div>
                
        <!--削除確認のダイヤログ表示-->
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
                    
            function deleteAllPosts() {
                if (confirm('全ての検索履歴を削除すると復元できません。\n本当に削除しますか？')) {
                    this.event.target.form.submit();
                }
            }
        </script>
    </x-app-layout>
