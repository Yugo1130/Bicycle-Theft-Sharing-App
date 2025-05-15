<x-app-layout>
    <x-slot name="header">
        編集
    </x-slot>
    <form action="/abandonedbicycles/{{ $abdbike->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="image">
            <label for="image"></label>
            <!-- 画像プレビュー（初期状態では既存画像を表示） -->
            <img id="imagePreview" src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}" alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">
            <p>変更したい場合は新しい画像を選択してください．</p>
            <!-- ファイル選択フォーム（acceptで画像のみ許可）-->
            <div class="file-upload-wrapper">
                <input type="file" name="image" id="image" accept="image/*">
            </div>
        </div>
        <div class="model">
            <label for="model">車種</label>
            <select name="abandonedbicycle[model]">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                <option value="{{ $model }}" {{ $abdbike->model === $model ? 'selected' : '' }}>
                    {{ $model }}
                </option>
                @endforeach
            </select>
        </div>
        <label for="manufacturer">メーカー名</label>
        <input list="manufacturer_list" name="abandonedbicycle[manufacturer]" id="manufacturer" value="{{ $abdbike->manufacturer }}">
        <datalist id="manufacturer_list">
            @foreach($manufacturers as $key => $value)
            <option value="{{ $key }}（{{ $value }}）"></option>
            @endforeach
        </datalist>
        <div class="model_name">
            <label for="model_name">車体名</label>
            <input type="text" name="abandonedbicycle[model_name]" value="{{ $abdbike->model_name }}" id="model_name">
        </div>
        <div class="frame_num">
            <label for="frame_num">車体番号</label>
            <input type="text" name="abandonedbicycle[frame_num]" value="{{ $abdbike->frame_num }}" id="frame_num">
        </div>
        <div class="color">
            <label for="color">色</label>
            <input type="text" name="abandonedbicycle[color]" value="{{ $abdbike->color }}" id="color">
        </div>
        <div class="bouhan_num">
            <label for="bouhan_num">防犯登録</label>
            <select name="abandonedbicycle[prefecture]" id="prefecture" value="{{ $abdbike->prefecture }}">
                <option value="">-- 選択してください --</option>
                @foreach ($prefectures as $key => $value)
                <option value="{{ $key }}" @if ($abdbike->prefecture === $key) selected @endif>{{ $key }}</option>
                @endforeach
            </select>
            <input type="text" name="abandonedbicycle[bouhan_num]" id="bouhan_num" value="{{ $abdbike->bouhan_num }}">
        </div>
        <div class="found_at">
            <label for="found_at">発見日時</label>
            <input type="datetime-local" name="abandonedbicycle[found_at]" value="{{ $abdbike->found_at }}" id="found_at" min="2000-01-01T00:00" max="2099-12-31T23:59">
        </div>
        <div class="found_location">
            <label for="found_location">発見場所</label>
            <input type="text" name="abandonedbicycle[found_location]" value="{{ $abdbike->found_location }}" id="found_location">
        </div>
        <div class="features">
            <label for="features">車体特徴</label>
            <textarea name="abandonedbicycle[features]" id="features">{{ $abdbike->features }}</textarea>
        </div>
        <div class="other">
            <label for="other">その他</label>
            <textarea name="abandonedbicycle[other]" id="other">{{ $abdbike->other }}</textarea>
        </div>
        <input type="submit" value="更新" />
    </form>
    <div class="footer">
        <a href="/abandonedbicycles/{{ $abdbike->id }}">キャンセル</a>
    </div>
    <script>
        const prefectures = @json($prefectures);

        const select = document.getElementById('prefecture');
        const input = document.getElementById('bouhan_num');

        select.addEventListener('change', function() {
            const selected = select.value;

            if (selected && prefectures[selected]) {
                input.placeholder = prefectures[selected];
            } else {
                input.placeholder = '';
            }
        });
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
</x-app-layout>