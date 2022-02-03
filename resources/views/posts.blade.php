<div class="card-body">
    @foreach($posts as $post)
        <p>ID {{ $post->user_id }} : {{ $post->name }}</p>
        <p> {{ $post->contents }}</p>
        <p style="text-align: right">number{{ $post->id }}</p>
        <!--ここから下はボタン-->
        <!--Auth:check()、認証チェックがなかったから動かなかった-->
        <div class="post-control">
            @if (Auth::check() && !Auth::user()->is_bookmark($post->id))
            <form action="{{ route('bookmark.store', $post) }}" method="post">
                @csrf
                <button>お気に入り登録</button>
            </form>
            @else
            <form action="{{ route('bookmark.destroy', $post) }}" method="post">
                @csrf
                @method('delete')
                <button>お気に入り解除</button>
            </form>
            @endif
        </div>
        <hr>
    @endforeach
</div>