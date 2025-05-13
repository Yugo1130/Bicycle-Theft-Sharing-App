<x-app-layout>
    <x-slot name="header">
        発見された自転車の詳細
    </x-slot>
    <div class='abdbikes'>
        <div class="abdbike">
            <!-- 要修正 -->
            <img src="{{ asset('storage/' . $abdbike->image_path) }}" alt="Bike Image" class="bike-image">
            <div class="abdbike-info">
                <p><strong>車種：</strong>{{ $abdbike->model }}</p>
                <p><strong>メーカー名：</strong>{{ $abdbike->manufacturer }}</p>
                <p><strong>車体名：</strong>{{ $abdbike->model_name }}</p>
                <p><strong>色：</strong>{{ $abdbike->color }}</p>
                <p><strong>車体番号：</strong>{{ $abdbike->frame_num }}</p>
                <p><strong>防犯登録番号：</strong>{{ $abdbike->prefecture }} {{ $abdbike->bouhan_num }}</p>
                <p><strong>発見日時：</strong>{{ $abdbike->found_at }}</p>
                <p><strong>発見場所：</strong>{{ $abdbike->found_location }}</p>
            </div>
            <p><strong>車体特徴：</strong>{{ $abdbike->features }}</p>
            <p><strong>その他：</strong>{{ $abdbike->other }}</p>
            <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
        </div>
    </div>
    @auth
    @if (Auth::id() === $abdbike->user_id)
    <div>
        <a href="{{ url('/abandonedbicycles/' . $abdbike->id . '/edit') }}">
            <button type="button">編集</button>
        </a>
        <form action="/abandonedbicycles/{{ $abdbike->id }}" id="form_{{ $abdbike->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteAbdbike({{ $abdbike->id }})">削除</button>
        </form>
    </div>
    @endif
    @endauth
    <div class="footer">
        <a href="/abandonedbicycles">一覧へ戻る</a>
    </div>

    <h2>コメント作成</h2>
    @if (Auth::check())
    <form action="/abandonedbicycles/{{ $abdbike->id }}/comments" method="POST">
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
            <form action="/abandonedcomments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletecomment({{ $comment->id }})">削除</button>
                @endif
                @endauth
            </form>
        </div>
        @endforeach
    </div>

    <div class="footer">
        <a href="/abandonedbicycles">一覧へ戻る</a>
    </div>

    <script>
        function deleteAbdbike(id) {
            // 厳格モード有効
            'use strict';

            // confirm()でダイアログ出力
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }

        function deletecomment(id) {
            // 厳格モード有効
            'use strict';

            // confirm()でダイアログ出力
            if (confirm('コメントを削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>