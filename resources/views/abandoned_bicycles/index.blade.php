<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>発見された自転車一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <a href='stolenbicycles'>自転車盗難情報はこちら<br><br></a>
        <a href='stolenbicycles/create'>探している自転車が一覧にない場合はこちら（盗難自転車情報登録）<br>※ログインが必要です．<br><br></a>
        <h1>発見された自転車一覧</h1>
        <form action="/abandonedbicycles" method="GET">
            車種：
            <select name="model">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                    <option value="{{ $model }}" {{ request('model') === $model ? 'selected' : '' }}>
                        {{ $model }}
                    </option>
                @endforeach
            </select>
            メーカー：
            <input type="text" name="manufacturer" placeholder="メーカーを入力" value="{{ request('manufacturer') }}">
            車体番号：
            <input type="text" name="frame_num" placeholder="車体番号を入力" value="{{ request('frame_num') }}">
            防犯登録番号：
            <input type="text" name="bouhan_num" placeholder="防犯登録番号を入力" value="{{ request('bouhan_num') }}">
            <button type="submit">検索</button>
        </form>
        <a href="/abandonedbicycles">
            <button type="button">絞り込み条件クリア</button>
        </a>

        <div class='abdbikes'>
            @foreach ($abdbikes as $abdbike)
                <a href="/abandonedbicycles/{{ $abdbike->id }}">
                    <div class="abdbike">
                        <!-- 要修正 -->
                        <img src="{{ asset('storage/' . $abdbike->image_path) }}" alt="Bike Image" class="bike-image">
                        <div class="bike-info">
                            <p><strong>車種：</strong>{{ $abdbike->model }}</p>
                            <p><strong>メーカー名：</strong>{{ $abdbike->manufacturer }}</p>
                            <p><strong>車体名：</strong>{{ $abdbike->model_name }}</p>
                            <p><strong>盗難場所：</strong>{{ $abdbike->found_location }}</p>
                            <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $abdbikes->links() }}
        </div>
    </body>
</html>