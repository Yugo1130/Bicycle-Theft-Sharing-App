<x-app-layout>
    <x-slot name="header">
        盗難自転車詳細
    </x-slot>
    <div class='slnbikes'>
        <div class="slnbike">
            <p><strong>投稿ユーザID：</strong>{{ $slnbike->user_id }}<strong> / 最終更新日：</strong>{{ $slnbike->updated_at }}</p>
            <img src="{{ empty($slnbike->image_path) ? asset('images/no-image.png') : $slnbike->image_path }}" alt="プレビュー画像" style="max-width: 300px; height: auto;">
            <div class="slnbike-info">
                <p><strong>車種：</strong>{{ $slnbike->model }}</p>
                <p><strong>メーカー名：</strong>{{ $slnbike->manufacturer }}</p>
                <p><strong>車体名：</strong>{{ $slnbike->model_name }}</p>
                <p><strong>色：</strong>{{ $slnbike->color }}</p>
                <p><strong>車体番号：</strong>{{ $slnbike->frame_num }}</p>
                <p><strong>防犯登録番号：</strong>{{ $slnbike->prefecture }} {{ $slnbike->bouhan_num }}</p>
                <p><strong>盗難日時：</strong>{{ $slnbike->stolen_at }}</p>
                <p><strong>盗難場所：</strong>{{ $slnbike->stolen_location }}</p>
            </div>
            <p><strong>車体特徴：</strong>{{ $slnbike->features }}</p>
            <p><strong>その他：</strong>{{ $slnbike->other }}</p>
        </div>
    </div>

    @auth
    @if (Auth::id() === $slnbike->user_id)
    <div>
        <a href="{{ route('sln.edit', $slnbike) }}">
            <button type="button">編集</button>
        </a>
        <form action="{{ route('sln.delete', $slnbike) }}" id="form_{{ $slnbike->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteSlnbike({{ $slnbike->id }})">削除</button>
        </form>
    </div>
    @endif
    @endauth

    <div class="footer">
        <a href="{{ route('sln.index') }}">一覧へ戻る</a>
    </div>

    <h2>コメント作成</h2>
    @if (Auth::check())
    <form action="{{ route('slncmtstore', $slnbike) }}" method="POST">
        @csrf
        <textarea name="comment" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">投稿</button>
    </form>
    @else
    @php
    session(['url.intended' => url()->full()]);
    @endphp
    <a href="{{ route('login') }}">コメントを投稿するにはログインしてください．</a>
    @endif

    <h2>コメント一覧</h2>
    <div class='comments'>
        @foreach ($comments as $comment)
        <div class="comment">
            <p><small>投稿者ID: {{ $comment->user_id }} 投稿日時: {{ $comment->created_at }}</small></p>
            <p>{{ $comment->comment }}</p>
            @auth
            @if (Auth::id() === $comment->user_id)
            <form action="{{ route('slncmt.delete', $comment) }}" id="form_{{ $comment->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletecomment({{ $comment->id }})">削除</button>
            </form>
            @endif
            @endauth
        </div>
        @endforeach
    </div>

    <div class="footer">
        <a href="{{ route('sln.index') }}">一覧へ戻る</a>
    </div>

    <script>
        // 厳格モード有効
        'use strict';

        function deleteSlnbike(id) {
            // confirm()でダイアログ出力
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }

        function deletecomment(id) {
            // confirm()でダイアログ出力
            if (confirm('コメントを削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>