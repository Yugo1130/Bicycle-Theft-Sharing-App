<x-app-layout>
    <x-slot name="header">
        盗難自転車情報登録
    </x-slot>
    <form action="{{ route('sln.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image">
            <label for="image"></label>
            <!-- 画像プレビュー -->
            <img id="imagePreview"
                src="{{ asset('images/no-image.png') }}" alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">
            <!-- エラー表示 -->
            <p id="imageError" style="color: red; font-size: 0.9rem;">{{ $errors->first('image') }}</p>
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
            <select name="stolenbicycle[model]" id="model">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                <option value="{{ $model }}" {{ old('stolenbicycle.model') === $model ? 'selected' : '' }}>
                    {{ $model }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model') }}</p>
        </div>

        <label for="manufacturer">メーカー名</label>
        <input list="manufacturer_list" name="stolenbicycle[manufacturer]" id="manufacturer"
            value="{{ old('stolenbicycle.manufacturer') }}">
        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.manufacturer') }}</p>

        <div class="model_name">
            <label for="model_name">車体名</label>
            <input type="text" name="stolenbicycle[model_name]" id="model_name"
                value="{{ old('stolenbicycle.model_name') }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model_name') }}</p>
        </div>

        <div class="frame_num">
            <label for="frame_num">車体番号</label>
            <input type="text" name="stolenbicycle[frame_num]" id="frame_num"
                value="{{ old('stolenbicycle.frame_num') }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.frame_num') }}</p>
        </div>

        <div class="color">
            <label for="color">色</label>
            <input type="text" name="stolenbicycle[color]" id="color"
                value="{{ old('stolenbicycle.color') }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.color') }}</p>
        </div>

        <div class="bouhan_num">
            <label for="bouhan_num">防犯登録</label>
            <select name="stolenbicycle[prefecture]" id="prefecture">
                <option value="">-- 選択してください --</option>
                @foreach ($prefectures as $key => $value)
                <option value="{{ $key }}" {{ old('stolenbicycle.prefecture') === $key ? 'selected' : '' }}>
                    {{ $key }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.prefecture') }}</p>
            <input type="text" name="stolenbicycle[bouhan_num]" id="bouhan_num"
                value="{{ old('stolenbicycle.bouhan_num') }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.bouhan_num') }}</p>
        </div>

        <div class="stolen_at">
            <label for="stolen_at">発見日時</label>
            <input type="datetime-local" name="stolenbicycle[stolen_at]" id="stolen_at"
                value="{{ old('stolenbicycle.stolen_at') }}"
                min="2000-01-01T00:00" max="2099-12-31T23:59">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_at') }}</p>
        </div>

        <div class="stolen_location">
            <label for="stolen_location">発見場所</label>
            <input type="text" name="stolenbicycle[stolen_location]" id="stolen_location"
                value="{{ old('stolenbicycle.stolen_location') }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_location') }}</p>
        </div>

        <div class="features">
            <label for="features">車体特徴</label>
            <textarea name="stolenbicycle[features]" id="features">{{ old('stolenbicycle.features') }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.features') }}</p>
        </div>

        <div class="other">
            <label for="other">その他</label>
            <textarea name="stolenbicycle[other]" id="other">{{ old('stolenbicycle.other') }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.other') }}</p>
        </div>

        <input type="submit" value="登録" />
    </form>


    <div class="footer">
        <a href="{{ route('sln.index') }}">登録をやめる</a>
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