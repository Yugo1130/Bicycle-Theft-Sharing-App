<x-app-layout>
    <x-slot name="header">
        編集
    </x-slot>
    <form action="{{ route('abd.update', $abdbike) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="image">
            <label for="image"></label>
            <!-- 画像プレビュー（初期状態では既存画像を表示） -->
            <img id="imagePreview" src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}" alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">
            <!-- エラー表示 -->
            <p id="imageError" style="color: red; font-size: 0.9rem;">{{ $errors->first('image') }}</p>
            <p>変更したい場合は新しい画像を選択してください．</p>
            <!-- ファイル選択フォーム -->
            <div class="file-upload-wrapper">
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            <button type="button" id="imageClearButton" style="margin-top: 5px;">
                画像を選択解除
            </button>
        </div>

        <div class="model">
            <label for="model">車種</label>
            <select name="abandonedbicycle[model]">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                <option value="{{ $model }}" {{ old('abandonedbicycle.model', $abdbike->model) === $model ? 'selected' : '' }}>
                    {{ $model }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.model') }}</p>
        </div>

        <label for="manufacturer">メーカー名</label>
        <input list="manufacturer_list" name="abandonedbicycle[manufacturer]" id="manufacturer" value="{{ old('abandonedbicycle.manufacturer', $abdbike->manufacturer) }}">
        <datalist id="manufacturer_list">
            @foreach($manufacturers as $key => $value)
            <option value="{{ $key }}（{{ $value }}）"></option>
            @endforeach
        </datalist>
        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.manufacturer') }}</p>

        <div class="model_name">
            <label for="model_name">車体名</label>
            <input type="text" name="abandonedbicycle[model_name]" value="{{ old('abandonedbicycle.model_name', $abdbike->model_name) }}" id="model_name">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.model_name') }}</p>
        </div>

        <div class="frame_num">
            <label for="frame_num">車体番号</label>
            <input type="text" name="abandonedbicycle[frame_num]" value="{{ old('abandonedbicycle.frame_num', $abdbike->frame_num) }}" id="frame_num">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.frame_num') }}</p>
        </div>

        <div class="color">
            <label for="color">色</label>
            <input type="text" name="abandonedbicycle[color]" value="{{ old('abandonedbicycle.abdbike->color', $abdbike->color) }}" id="color">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.color') }}</p>
        </div>

        <div class="bouhan_num">
            <label for="bouhan_num">防犯登録</label>
            <select name="abandonedbicycle[prefecture]" id="prefecture">
                <option value="">-- 選択してください --</option>
                @foreach ($prefectures as $key => $value)
                <option value="{{ $key }}" {{ old('abandonedbicycle.prefecture', $abdbike->prefecture) === $key ? 'selected' : '' }}>
                    {{ $key }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.prefecture') }}</p>
            <input type="text" name="abandonedbicycle[bouhan_num]" id="bouhan_num" value="{{ old('abandonedbicycle.bouhan_num', $abdbike->bouhan_num) }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.bouhan_num') }}</p>
        </div>

        <div class="found_at">
            <label for="found_at">発見日時</label>
            <input type="datetime-local" name="abandonedbicycle[found_at]" value="{{ old('abandonedbicycle.found_at', $abdbike->found_at) }}" id="found_at" min="2000-01-01T00:00" max="2099-12-31T23:59">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.found_at') }}</p>
        </div>

        <div class="found_location">
            <label for="found_location">発見場所</label>
            <input type="text" name="abandonedbicycle[found_location]" value="{{ old('abandonedbicycle.found_location', $abdbike->found_location) }}" id="found_location">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.found_location') }}</p>
        </div>

        <div class="features">
            <label for="features">車体特徴</label>
            <textarea name="abandonedbicycle[features]" id="features">{{ $abdbike->features }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.features') }}</p>
        </div>

        <div class="other">
            <label for="other">その他</label>
            <textarea name="abandonedbicycle[other]" id="other">{{ $abdbike->other }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.other') }}</p>
        </div>

        <input type="submit" value="更新" />
    </form>

    <div class="footer">
        <a href="{{ route('abd.show', $abdbike) }}">キャンセル</a>
    </div>

    <script>
        const prefectures = @json($prefectures);

        const input = document.getElementById('bouhan_num');
        const imageInput = document.getElementById('image');
        const imageError = document.getElementById('imageError');
        const imagePreview = document.getElementById('imagePreview');
        const defaultImage = "{{ asset('images/no-image.png') }}";
        const select = document.getElementById('prefecture');

        // 都道府県を選択したらプレースホルダを変更
        select.addEventListener('change', function() {
            const selected = select.value;
            input.placeholder = selected && prefectures[selected] ? prefectures[selected] : '';
        });

        // 画像のバリデーション・エラーメッセージ表示・プレビュー切替
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const maxSizeMB = 1;

            // ファイル未選択時（ダイアログでキャンセルを押した場合）
            if (!file) {
                return;
            }

            const fileSizeMB = file.size / (1024 * 1024);

            if (fileSizeMB > maxSizeMB) {
                // サイズオーバー時のエラーメッセージとリセット
                imageError.textContent = `画像サイズが大きすぎます（${fileSizeMB.toFixed(2)}MB）．最大 ${maxSizeMB}MB までです．`;
                imageInput.value = '';
                imagePreview.src = defaultImage;
            } else {
                // エラーを消して画像を表示
                imageError.textContent = '';
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // 画像選択を解除するボタン
        document.getElementById('imageClearButton').addEventListener('click', function() {
            imageError.textContent = '';
            imageInput.value = '';
            imagePreview.src = defaultImage;
        });
    </script>
</x-app-layout>