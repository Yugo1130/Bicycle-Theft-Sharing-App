<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>放置自転車詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/abandone_bicycles.css') }}"> -->
    </head>
    <body>
        <h1>放置自転車詳細</h1>
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
                    <p><strong>防犯登録番号：</strong>{{ $abdbike->bouhan_num }}</p>
                    <p><strong>発見日時：</strong>{{ $abdbike->found_at }}</p>
                    <p><strong>発見場所：</strong>{{ $abdbike->found_location }}</p>
                </div>
                <p><strong>車体特徴：</strong>{{ $abdbike->features }}</p>
                <p><strong>その他：</strong>{{ $abdbike->other }}</p>
                <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/abandonedbicycles">一覧へ戻る</a>
        </div>
    </body>
</html>