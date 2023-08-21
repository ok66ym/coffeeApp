    <x-app-layout>
        <div class="pt-20 pb-40">

            <div class="flex flex-col justify-center items-center min-h-screen bg-orange-100 relative w-full">
                <!--投稿結果を表示-->
                <h1 class="flex justify-center mt-5 ml-5 border-b-4 border-orange-800 w-96 text-gray-700">
                    検索結果一覧
                </h1>
            
                <form action="{{ route('histories.alldelete') }}" method="POST">
                @csrf   
                @method('DELETE')
                <button class="text-xs mt-5 text-gray-700 hover:text-orange-700" type="button" onclick="deleteAllPosts()">全ての検索履歴を削除</button>
                </form>
                
                <div class="font-bold text-base mt-5 w-2/3">
                    <div class='border-orange-300 flex flex-col justify-center items-center'>

                        @foreach ($searchstores as $searchstore)
                            <div class="border-t border-b border-orange-300 py-3 flex justify-center items-center w-2/3 relative">
                                <div>
                                    <div class='search_history'>
                                        <h2 class='flex justify-beween items-center'>
                                            <div class="text-base p-50 text-gray-700 font-bold hover:text-orange-700 rounded transition duration-300 no-underline mr-3">
                                                {{ $searchstore->created_at }}
                                            </div>
                                        </h2>
                                    </div>
                                
                                    <!-- 苦味、酸味、コク、甘味、香りの表示部分 -->
                                    <div class="flex items-center space-x-4 mt-2 text-sm">
                                        <div class="searchHistory_index">
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">苦味</span>{{ $searchstore['bitter'] }}
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">酸味</span>{{ $searchstore['acidity'] }}
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">コク</span>{{ $searchstore['rich'] }}
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">甘味</sapn>{{ $searchstore['sweet'] }}
                                            <span class="bg-orange-300 text-gray-700 px-1 rounded">香り</span>{{ $searchstore['smell'] }}
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-center items-center space-x-4 mt-3">
                                        <a href="{{ route('search.redbresults', ['bitter' => $searchstore->bitter, 'acidity' => $searchstore->acidity, 'rich' => $searchstore->rich, 'sweet' => $searchstore->sweet, 'smell' => $searchstore->smell]) }}" 
                                           class="text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded cursor-pointer no-underline">
                                           コーヒーを再検索
                                        </a>
                                        
                                        <a href="{{ route('search.repostresults', ['bitter' => $searchstore->bitter, 'acidity' => $searchstore->acidity, 'rich' => $searchstore->rich, 'sweet' => $searchstore->sweet, 'smell' => $searchstore->smell]) }}" 
                                           class="text-sm bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded cursor-pointer no-underline">
                                           みんなの投稿から再検索
                                        </a>
                                    </div>
                                    
                                    <!--検索履歴削除ボタン-->
                                        <form action="/histories/{{ $searchstore->id }}" id="form_{{ $searchstore->id }}" method="post">
                                             @csrf
                                             @method('DELETE')
                                            <button class="text-xs absolute top-0 right-0 mt-5 text-gray-700 hover:text-orange-700" type="button" onclick="deletePost({{ $searchstore->id }})">履歴を削除<br><br></button>
                                        </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                        
                <div class='paginate'>
                    {{ $searchstores->links('paginator.custom') }}
                </div>
                
            </div>
        </div>
                
        <script>
        // 削除確認のダイヤログ表示
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
