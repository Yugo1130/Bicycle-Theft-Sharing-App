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
                    <p><strong>防犯登録番号：</strong>{{ $slnbike->bouhan_num }}</p>
                    <p><strong>盗難日時：</strong>{{ $slnbike->stolen_at }}</p>
                    <p><strong>盗難場所：</strong>{{ $slnbike->stolen_location }}</p>
                </div>
                <p><strong>車体特徴：</strong>{{ $slnbike->features }}</p>
                <p><strong>その他：</strong>{{ $slnbike->other }}</p>
                <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/stolenbicycles">一覧へ戻る</a>
        </div>
    </body>
</html>