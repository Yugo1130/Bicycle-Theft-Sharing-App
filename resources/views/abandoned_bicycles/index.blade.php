<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>発見された自転車一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/abandoned_bicycles.css') }}"> -->
    </head>
    <body>
        <h1>発見された自転車一覧</h1>
        <div class='abdbikes'>
            <a href='stolenbicycles/create'>見つからない場合（盗難自転車情報登録）<br>※ログインが必要です．<br><br></a>
            @foreach ($abdbikes as $abdbike)
                <a href="/abandonedbicycles/ {{ $abdbike->id }}">
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