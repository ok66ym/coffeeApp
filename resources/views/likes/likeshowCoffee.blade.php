<x-app-layout>
        <div class="pt-5">
            <!--投稿情報-->
            
            <h2 class"likesCoffee_name">
                {{ $coffee->name }}
            </h2>
            
            <h3 class="likesCoffee_species_name">
                種名：{{ $coffee->species_name }}
            </h3>
            
            <h3 class="likesCoffee_area_name">
                産地：{{ $coffee->area_name }}
            </h3>
            
            <h4 class="likesCoffee__evaluation">
                苦味：{{$coffee->bitter}} &nbsp 酸味：{{ $coffee->acidity }} &nbsp コク：{{ $coffee->rich }} &nbsp 甘味：{{ $coffee->sweet }} &nbsp 香り：{{ $coffee->smell }}
            </h4>
            
            <h4 class="likesCoffee_roasted">
                焙煎度：{{ $coffee->roasted }}
            </h4>
            
            <h3>
                販売店：<a href="{{ $coffee->shop_url }}" target="_blank">{{ $coffee->shop_name }}</a>
            </h3>
            
            <a href="{{ $coffee->official_url }}" target="_blank">公式<br></a>
            
            <!--いいね機能実装-->
            <!-- ハートボタン -->
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

            <div class="footer">
                <a href="/likes">いいね一覧へ</a>
            </div>
        </div>
</x-app-layout>
