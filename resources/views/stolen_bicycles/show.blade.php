<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>盗難自転車詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/stolen_bicycles.css') }}"> -->
    </head>
    <body>
        <h1>盗難自転車詳細</h1>
        <div class='slnbikes'>
            <div class="slnbike">
                <!-- 要修正 -->
                <img src="{{ asset('storage/' . $slnbike->image_path) }}" alt="Bike Image" class="bike-image">
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
                <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
            </div>
        </div>
        <a href="{{ url('/stolenbicycles/' . $slnbike->id . '/edit') }}">
            <button type="button">編集</button>
        </a>
                <!-- 要ログインかつ投稿したユーザであるかの判別を加える -->
                <form action="/stolenbicycles/{{ $slnbike->id }}" id="form_{{ $slnbike->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- button type="submit"だと確認せずに送信される。以下のようにすると、deleteSlnbike関数でsubmitが呼ばれた際に送信される。 -->
                    <button type="button" onclick="deleteSlnbike({{ $slnbike->id }})">削除</button> 
                </form>

        <div class="footer">
            <a href="/stolenbicycles">一覧へ戻る</a>
        </div>

        <h2>コメント作成</h2>
        <form action="/stolenbicycles/{{ $slnbike->id }}/comments" method="POST">
            @csrf
            <textarea name="comment" rows="4" cols="50" required></textarea>
            <br>
            <button type="submit">投稿</button>
        </form>
        <h2>コメント一覧</h2>
        <div class='comments'>
            @foreach ($comments as $comment)
                <div class="comment">
                    <p><small>投稿者ID: {{ $comment->user_id }} 投稿日時: {{ $comment->created_at }}</small></p>
                    <p>{{ $comment->comment }}</p>
                    <!-- 要ログインかつ投稿したユーザであるかの判別を加える -->
                    <form action="/stolencomments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="button" onclick="deletecomment({{ $comment->id }})">削除</button> 
                </form>
                </div>
            @endforeach
        </div>

        <div class="footer">
            <a href="/stolenbicycles">一覧へ戻る</a>
        </div>

        <script>
            function deleteSlnbike(id) {
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
    </body>
</html>