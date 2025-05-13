<x-app-layout>
    <x-slot name="header">
        盗難自転車情報登録
    </x-slot>
    <form action="/stolenbicycles" method="POST" enctype="multipart/form-data">
        @csrf
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
            <!-- 要変更 -->
            <input type="datetime-local" name="stolenbicycle[stolen_at]" id="stolen_at">
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
        <div class="image">
            <label for="image">画像</label>
            <input type="file" name="image" id="image">
        </div>
        <input type="submit" value="登録" />
    </form>
    <div class="footer">
        <a href="/stolenbicycles">登録をやめる</a>
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
    </script>
</x-app-layout>