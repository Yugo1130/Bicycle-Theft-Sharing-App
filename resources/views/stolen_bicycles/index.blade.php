<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>盗難自転車情報</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/stolen_bicycles.css') }}"> -->
    </head>
    <body>
        <h1>盗難自転車情報</h1>
        <div class='slnbikes'>
            <a href='stolenbicycles/create'>自転車を盗まれた方はこちら</a>
            @foreach ($slnbikes as $slnbike)
                <a href="/stolenbicycles/ {{ $slnbike->id }}">
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