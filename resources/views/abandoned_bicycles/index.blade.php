<x-app-layout>
    <x-slot name="header">
        全国で発見された自転車の情報です．
    </x-slot>
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
                <br>
                <img src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}" alt="プレビュー画像" style="max-width: 200px; height: auto;">
                <div class="bike-info">
                    <p><strong>車種：</strong>{{ $abdbike->model }}</p>
                    <p><strong>メーカー名：</strong>{{ $abdbike->manufacturer }}</p>
                    <p><strong>車体名：</strong>{{ $abdbike->model_name }}</p>
                    <p><strong>盗難場所：</strong>{{ $abdbike->found_location }}</p>
                    <p><strong>投稿ユーザID：</strong>{{ $abdbike->user_id }}<strong> / 最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $abdbikes->links() }}
    </div>
</x-app-layout>