<x-app-layout>
    <x-slot name="header">
        編集
    </x-slot>
    <form action="{{ route('sln.update', $slnbike) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="image">
            <label for="image"></label>
            <!-- 画像プレビュー（初期状態では既存画像を表示） -->
            <img id="imagePreview" src="{{ empty($slnbike->image_path) ? asset('images/no-image.png') : $slnbike->image_path }}" alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">
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
            <select name="stolenbicycle[model]">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                <option value="{{ $model }}" {{ old('stolenbicycle.model', $slnbike->model) === $model ? 'selected' : '' }}>
                    {{ $model }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model') }}</p>
        </div>

        <label for="manufacturer">メーカー名</label>
        <input list="manufacturer_list" name="stolenbicycle[manufacturer]" id="manufacturer" value="{{ old('stolenbicycle.manufacturer', $slnbike->manufacturer) }}">
        <datalist id="manufacturer_list">
            @foreach($manufacturers as $key => $value)
            <option value="{{ $key }}（{{ $value }}）"></option>
            @endforeach
        </datalist>
        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.manufacturer') }}</p>

        <div class="model_name">
            <label for="model_name">車体名</label>
            <input type="text" name="stolenbicycle[model_name]" value="{{ old('stolenbicycle.model_name', $slnbike->model_name) }}" id="model_name">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model_name') }}</p>
        </div>

        <div class="frame_num">
            <label for="frame_num">車体番号</label>
            <input type="text" name="stolenbicycle[frame_num]" value="{{ old('stolenbicycle.frame_num', $slnbike->frame_num) }}" id="frame_num">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.frame_num') }}</p>
        </div>

        <div class="color">
            <label for="color">色</label>
            <input type="text" name="stolenbicycle[color]" value="{{ old('stolenbicycle.slnbike->color', $slnbike->color) }}" id="color">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.color') }}</p>
        </div>

        <div class="bouhan_num">
            <label for="bouhan_num">防犯登録</label>
            <select name="stolenbicycle[prefecture]" id="prefecture">
                <option value="">-- 選択してください --</option>
                @foreach ($prefectures as $key => $value)
                <option value="{{ $key }}" {{ old('stolenbicycle.prefecture', $slnbike->prefecture) === $key ? 'selected' : '' }}>
                    {{ $key }}
                </option>
                @endforeach
            </select>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.prefecture') }}</p>
            <input type="text" name="stolenbicycle[bouhan_num]" id="bouhan_num" value="{{ old('stolenbicycle.bouhan_num', $slnbike->bouhan_num) }}">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.bouhan_num') }}</p>
        </div>

        <div class="stolen_at">
            <label for="stolen_at">発見日時</label>
            <input type="datetime-local" name="stolenbicycle[stolen_at]" value="{{ old('stolenbicycle.stolen_at', $slnbike->stolen_at) }}" id="stolen_at" min="2000-01-01T00:00" max="2099-12-31T23:59">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_at') }}</p>
        </div>

        <div class="stolen_location">
            <label for="stolen_location">発見場所</label>
            <input type="text" name="stolenbicycle[stolen_location]" value="{{ old('stolenbicycle.stolen_location', $slnbike->stolen_location) }}" id="stolen_location">
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_location') }}</p>
        </div>

        <div class="features">
            <label for="features">車体特徴</label>
            <textarea name="stolenbicycle[features]" id="features">{{ $slnbike->features }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.features') }}</p>
        </div>

        <div class="other">
            <label for="other">その他</label>
            <textarea name="stolenbicycle[other]" id="other">{{ $slnbike->other }}</textarea>
            <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.other') }}</p>
        </div>

        <input type="submit" value="更新" />
    </form>

    <div class="footer">
        <a href="{{ route('sln.show', $slnbike) }}">キャンセル</a>
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