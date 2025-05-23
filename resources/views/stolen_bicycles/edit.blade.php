<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            編集
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <form action="{{ route('sln.update', $slnbike) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="image">
                                <label for="image"></label>
                                <!-- 画像プレビュー -->
                                <img id="imagePreview"
                                    src="{{ empty($slnbike->image_path) ? asset('images/no-image.png') : $slnbike->image_path }}"
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
                                <select name="stolenbicycle[model]" id="model"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                    <option value="">-- 選択してください --</option>
                                    @foreach ($models as $model)
                                    <option value="{{ $model }}" {{ old('stolenbicycle.model', $slnbike->model) === $model ? 'selected' : '' }}>
                                        {{ $model }}
                                    </option>
                                    @endforeach
                                </select>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model') }}</p>
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
                                <input list="manufacturer_list" name="stolenbicycle[manufacturer]" id="manufacturer"
                                    placeholder="メーカー名を選択または入力"
                                    value="{{ old('stolenbicycle.manufacturer', $slnbike->manufacturer) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <datalist id="manufacturer_list">
                                    @foreach($manufacturers as $key => $value)
                                    <option value="{{ $key }}（{{ $value }}）"></option>
                                    @endforeach
                                </datalist>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.manufacturer') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="model_name">
                                <label for="model_name" class="mt-2 block text-sm font-medium text-gray-700">車体名</label>
                                <input type="text" name="stolenbicycle[model_name]" id="model_name"
                                    value="{{ old('stolenbicycle.model_name', $slnbike->model_name) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.model_name') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="frame_num">
                                <label for="frame_num" class="mt-2 block text-sm font-medium text-gray-700">車体番号</label>
                                <input type="text" name="stolenbicycle[frame_num]" id="frame_num"
                                    value="{{ old('stolenbicycle.frame_num', $slnbike->frame_num) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.frame_num') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="color">
                                <label for="color" class="mt-2 block text-sm font-medium text-gray-700">色</label>
                                <input type="text" name="stolenbicycle[color]" id="color"
                                    value="{{ old('stolenbicycle.slnbike->color', $slnbike->color) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.color') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="bouhan_num">
                                <label for="bouhan_num"
                                    class="mt-2 block text-sm font-medium text-gray-700">防犯登録</label>
                                <div class="flex gap-4">
                                    <!-- 都道府県選択 -->
                                    <div class="flex-1">
                                        <select name="stolenbicycle[prefecture]" id="prefecture"
                                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                            <option value="">-- 選択してください --</option>
                                            @foreach ($prefectures as $key => $value)
                                            <option value="{{ $key }}" {{ old('stolenbicycle.prefecture', $slnbike->prefecture) === $key ? 'selected' : '' }}>
                                                {{ $key }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.prefecture') }}</p>
                                    </div>
                                    <!-- 防犯登録番号入力欄 -->
                                    <div class="flex-1">
                                        <input type="text" name="stolenbicycle[bouhan_num]" id="bouhan_num"
                                            value="{{ old('stolenbicycle.bouhan_num', $slnbike->bouhan_num) }}"
                                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                        <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.bouhan_num') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="stolen_at">
                                <label for="stolen_at" class="mt-2 block text-sm font-medium text-gray-700">
                                    発見日時
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <input type="datetime-local" name="stolenbicycle[stolen_at]" id="stolen_at"
                                    value="{{ old('stolenbicycle.stolen_at', $slnbike->stolen_at) }}"
                                    min="2000-01-01T00:00" max="2099-12-31T23:59"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_at') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="stolen_location">
                                <label for="stolen_location" class="mt-2 block text-sm font-medium text-gray-700">
                                    発見場所
                                    <span class="inline-block px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded">
                                        必須
                                    </span>
                                </label>
                                <input type="text" name="stolenbicycle[stolen_location]" id="stolen_location"
                                    value="{{ old('stolenbicycle.stolen_location', $slnbike->stolen_location) }}"
                                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.stolen_location') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="features">
                                <label for="features">車体特徴</label>
                                <textarea name="stolenbicycle[features]" id="features" rows="4"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">{{ old('stolenbicycle.features', $slnbike->features) }}</textarea>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.features') }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="other">
                                <label for="other">その他</label>
                                <textarea name="stolenbicycle[other]" id="other" rows="4"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">{{ old('stolenbicycle.other', $slnbike->other) }}</textarea>
                                <p style="color: red; font-size: 0.9rem;">{{ $errors->first('stolenbicycle.other') }}</p>
                            </div>
                        </div>

                        <div class="w-full pt-4 flex justify-between">
                            <a href="{{ route('sln.show', $slnbike) }}">
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