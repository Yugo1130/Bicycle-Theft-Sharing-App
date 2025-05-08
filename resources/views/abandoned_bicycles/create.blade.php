<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>放置自転車情報登録</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/abandoned_bicycles.css') }}"> -->
    </head>
    <body>
        <h1>放置自転車情報登録</h1>
        <form action="/abandonedbicycles" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="model">
                <label for="model">車種</label>
                <input type="text" name="abandonedbicycle[model]" id="model">
            </div>
            <div class="manufacturer">
                <label for="manufacturer">メーカー名</label>
                <input type="text" name="abandonedbicycle[manufacturer]" id="manufacturer">
            </div>
            <div class="model_name">
                <label for="model_name">車体名</label>
                <input type="text" name="abandonedbicycle[model_name]" id="model_name">
            </div>
            <div class="frame_num">
                <label for="frame_num">車体番号</label>
                <input type="text" name="abandonedbicycle[frame_num]" id="frame_num">
            </div>
            <div class="color">
                <label for="color">色</label>
                <input type="text" name="abandonedbicycle[color]" id="color">
            </div>
            <div class="bouhan_num">
                <label for="bouhan_num">防犯登録</label>
                <input type="text" name="abandonedbicycle[bouhan_num]" id="bouhan_num">
            </div>
            <div class="found_at">
                <label for="found_at">発見日時</label>
                <!-- 要変更 -->
                <input type="datetime-local" name="abandonedbicycle[found_at]" id="found_at">
            </div>
            <div class="found_location">
                <label for="found_location">発見場所</label>
                <input type="text" name="abandonedbicycle[found_location]" id="found_location">
            </div>
            <div class="features">
                <label for="features">車体特徴</label>
                <textarea name="abandonedbicycle[features]" id="features"></textarea>
            </div>
            <div class="other">
                <label for="other">その他</label>
                <textarea name="abandonedbicycle[other]" id="other"></textarea>
            </div>
            <div class="image">
                <label for="image">画像</label>
                <input type="file" name="image" id="image">
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="footer">
            <a href="/abandonedbicycles">登録をやめる</a>
        </div>
    </body>
</html>