<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            編集
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <form action="{{ route('abd.update', $abdbike) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="image">
                                <label for="image"></label>
                                <!-- 画像プレビュー -->
                                <img id="imagePreview"
                                    src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}"
                                    alt="プレビュー画像" style="max-width: 300px; height: auto; margin-bottom: 10px;">

                                <!-- エラー表示 -->
                                <p id="imageError" class="text-red-600 text-xs mb-2">{{ $errors->first('image') }}</p>
                                <p>変更したい場合は新しい画像を選択してください．</p>

                                <!-- 選択フォームと解除ボタンを横並び -->
                                <div class="flex items-center gap-4">
                                    <!-- ファイル選択フォームを囲うボックス -->
                                    <div class="border border-gray-300 p-2 rounded-md">
                                        <input type="file" name="image" id="image" accept="image/*" class="text-sm">
                                    </div>

                                    <!-- 選択解除ボタン -->
                                    <x-secondary-button type="button" id="imageClearButton">
                                        画像を選択解除
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="model">
                                <label for="model" class="block text-sm font-medium text-gray-700">
                                    車種
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <select name="abandonedbicycle[model]" id="model"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                    <option value="">-- 選択してください --</option>
                                    @foreach ($models as $model)
                                    <option value="{{ $model }}" {{ old('abandonedbicycle.model', $abdbike->model) === $model ? 'selected' : '' }}>
                                        {{ $model }}
                                    </option>
                                    @endforeach
                                </select>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.model') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="manufacturer">
                                <label for="manufacturer" class="mt-2 block text-sm font-medium text-gray-700">
                                    メーカー
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <input list="manufacturer_list" name="abandonedbicycle[manufacturer]" id="manufacturer"
                                    placeholder="メーカー名を選択または入力"
                                    value="{{ old('abandonedbicycle.manufacturer', $abdbike->manufacturer) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <datalist id="manufacturer_list">
                                    @foreach($manufacturers as $key => $value)
                                    <option value="{{ $key }}（{{ $value }}）"></option>
                                    @endforeach
                                </datalist>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.manufacturer') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="model_name">
                                <label for="model_name" class="mt-2 block text-sm font-medium text-gray-700">車体名</label>
                                <input type="text" name="abandonedbicycle[model_name]" id="model_name"
                                    value="{{ old('abandonedbicycle.model_name', $abdbike->model_name) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.model_name') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="frame_num">
                                <label for="frame_num" class="mt-2 block text-sm font-medium text-gray-700">車体番号</label>
                                <input type="text" name="abandonedbicycle[frame_num]" id="frame_num"
                                    value="{{ old('abandonedbicycle.frame_num', $abdbike->frame_num) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.frame_num') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="color">
                                <label for="color" class="mt-2 block text-sm font-medium text-gray-700">色</label>
                                <input type="text" name="abandonedbicycle[color]" id="color"
                                    value="{{ old('abandonedbicycle.abdbike->color', $abdbike->color) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.color') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="bouhan_num">
                                <label for="bouhan_num"
                                    class="mt-2 block text-sm font-medium text-gray-700">防犯登録</label>
                                <div class="flex gap-4">
                                    <!-- 都道府県選択 -->
                                    <div class="flex-1">
                                        <select name="abandonedbicycle[prefecture]" id="prefecture"
                                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                            <option value="">-- 選択してください --</option>
                                            @foreach ($prefectures as $key => $value)
                                            <option value="{{ $key }}" {{ old('abandonedbicycle.prefecture', $abdbike->prefecture) === $key ? 'selected' : '' }}>
                                                {{ $key }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.prefecture') }}</p>
                                    </div>
                                    <!-- 防犯登録番号入力欄 -->
                                    <div class="flex-1">
                                        <input type="text" name="abandonedbicycle[bouhan_num]" id="bouhan_num"
                                            value="{{ old('abandonedbicycle.bouhan_num', $abdbike->bouhan_num) }}"
                                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.bouhan_num') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="found_at">
                                <label for="found_at" class="mt-2 block text-sm font-medium text-gray-700">
                                    発見日時
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <input type="datetime-local" name="abandonedbicycle[found_at]" id="found_at"
                                    value="{{ old('abandonedbicycle.found_at', $abdbike->found_at) }}"
                                    min="2000-01-01T00:00" max="2099-12-31T23:59"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.found_at') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="found_location">
                                <label for="found_location" class="mt-2 block text-sm font-medium text-gray-700">
                                    発見場所
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <input type="text" name="abandonedbicycle[found_location]" id="found_location"
                                    value="{{ old('abandonedbicycle.found_location', $abdbike->found_location) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.found_location') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="features">
                                <label for="features">車体特徴</label>
                                <textarea name="abandonedbicycle[features]" id="features" rows="4"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">{{ old('abandonedbicycle.features', $abdbike->features) }}</textarea>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.features') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="other">
                                <label for="other">その他</label>
                                <textarea name="abandonedbicycle[other]" id="other" rows="4"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">{{ old('abandonedbicycle.other', $abdbike->other) }}</textarea>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('abandonedbicycle.other') }}</p>
                            </div>
                        </div>

                        <div class="w-full pt-4 flex justify-between">
                            <a href="{{ route('abd.show', $abdbike) }}">
                                <x-secondary-button type="button">{{ __('キャンセル') }}</x-secondary-button>
                            </a>
                            <x-primary-button type="submit">{{ __('更新') }}</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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