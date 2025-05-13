<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>自転車盗難情報</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div>
            @if (Auth::check())
            ログインユーザ：{{ Auth::user()->name }}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
            @else
            @php(session(['login.from' => url()->full()]))
            <a href="{{ route('login') }}">ログイン</a>
            @endif
        </div>
        <a href='abandonedbicycles'>自転車を紛失された方はこちら（発見された自転車一覧）<br><br></a>
        <a href='abandonedbicycles/create'>放置されている自転車を発見された方（放置自転車情報登録）<br>※ログインが必要です．<br><br></a>
        <h1>自転車盗難情報</h1>
        <form action="/stolenbicycles" method="GET">
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
        <a href="/stolenbicycles">
            <button type="button">絞り込み条件クリア</button>
        </a>
        <div class='slnbikes'>
            @foreach ($slnbikes as $slnbike)
                <a href="/stolenbicycles/{{ $slnbike->id }}">
                    <div class="slnbike">
                        <!-- 要修正 -->
                        <img src="{{ asset('storage/' . $slnbike->image_path) }}" alt="Bike Image" class="bike-image">
                        <div class="slnbike-info">
                            <p><strong>車種：</strong>{{ $slnbike->model }}</p>
                            <p><strong>メーカー名：</strong>{{ $slnbike->manufacturer }}</p>
                            <p><strong>車体名：</strong>{{ $slnbike->model_name }}</p>
                            <p><strong>盗難場所：</strong>{{ $slnbike->stolen_location }}</p>
                            <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $slnbikes->links() }}
        </div>
    </body>
</html>