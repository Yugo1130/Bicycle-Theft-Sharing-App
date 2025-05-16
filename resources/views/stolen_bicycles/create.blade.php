<x-app-layout>
    <x-slot name="header">
        盗難自転車情報登録
    </x-slot>
    <form action="{{ route('sln.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image">
            <label for="image"></label>
            <!-- 画像プレビュー -->
            <img id="imagePreview" src="{{ asset('images/no-image.png') }}" alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">
            <div class="file-upload-wrapper">
                <!-- ファイル選択フォーム（acceptで画像のみ許可）-->
                <input type="file" name="image" id="image" accept="image/*">
            </div>
        </div>

        <div class="model">
            <label for="model">車種</label>
            <select name="stolenbicycle[model]">
                <option value="">-- 選択してください --</option>
                @foreach ($models as $model)
                <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>

        <label for="manufacturer">メーカー名</label>
        <input list="manufacturer_list" name="stolenbicycle[manufacturer]" id="manufacturer">
        <datalist id="manufacturer_list">
            @foreach($manufacturers as $key => $value)
            <option value="{{ $key }}（{{ $value }}）"></option>
            @endforeach
        </datalist>

        <div class="model_name">
            <label for="model_name">車体名</label>
            <input type="text" name="stolenbicycle[model_name]" id="model_name">
        </div>

        <div class="frame_num">
            <label for="frame_num">車体番号</label>
            <input type="text" name="stolenbicycle[frame_num]" id="frame_num">
        </div>

        <div class="color">
            <label for="color">色</label>
            <input type="text" name="stolenbicycle[color]" id="color">
        </div>

        <div class="bouhan_num">
            <label for="bouhan_num">防犯登録</label>
            <select name="stolenbicycle[prefecture]" id="prefecture">
                <option value="">-- 選択してください --</option>
                @foreach ($prefectures as $key => $value)
                <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
            </select>
            <input type="text" name="stolenbicycle[bouhan_num]" id="bouhan_num">
        </div>

        <div class="stolen_at">
            <label for="stolen_at">盗難日時</label>
            <input type="datetime-local" name="stolenbicycle[stolen_at]" id="stolen_at" value="{{ now()->format('Y-m-d\TH:i') }}" min="2000-01-01T00:00" max="2099-12-31T23:59">
        </div>

        <div class="stolen_location">
            <label for="stolen_location">盗難場所</label>
            <input type="text" name="stolenbicycle[stolen_location]" id="stolen_location">
        </div>

        <div class="features">
            <label for="features">車体特徴</label>
            <textarea name="stolenbicycle[features]" id="features"></textarea>
        </div>

        <div class="other">
            <label for="other">その他</label>
            <textarea name="stolenbicycle[other]" id="other"></textarea>
        </div>

        <input type="submit" value="登録" />
    </form>

    <div class="footer">
        <a href="{{ route('sln.index') }}">登録をやめる</a>
    </div>

    <script>
        const prefectures = @json($prefectures);

        const select = document.getElementById('prefecture');
        const input = document.getElementById('bouhan_num');

        select.addEventListener('change', function() {
            const selected = select.value;
            input.placeholder = selected && prefectures[selected] ? prefectures[selected] : '';
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