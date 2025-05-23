<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            全国で盗難された自転車の情報です．情報提供をお願いします．
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('abd.create') }}" class="block text-blue-600 underline">
                    放置されている自転車を発見された方（放置自転車情報登録）
                </a>
                <span class="text-sm text-gray-600">※ログインが必要です．</span>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form action="{{ route('sln.index') }}" method="GET">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">車種：</label>
                        <select name="model" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                            <option value="">-- 選択してください --</option>
                            @foreach ($models as $model)
                            <option value="{{ $model }}" {{ request('model') === $model ? 'selected' : '' }}>
                                {{ $model }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mt-2 block text-sm font-medium text-gray-700">メーカー：</label>
                        <input type="text" name="manufacturer" placeholder="メーカーを入力" value="{{ request('manufacturer') }}"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="mt-2 block text-sm font-medium text-gray-700">車体番号：</label>
                        <input type="text" name="frame_num" placeholder="車体番号を入力" value="{{ request('frame_num') }}"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="mt-2 block text-sm font-medium text-gray-700">防犯登録番号：</label>
                        <input type="text" name="bouhan_num" placeholder="防犯登録番号を入力" value="{{ request('bouhan_num') }}"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>
                    <div class="w-full pt-4 flex justify-between">
                        <a href="{{ route('sln.index') }}">
                            <x-secondary-button type="button">{{ __('絞り込み条件クリア') }} </x-secondary-button>
                        </a>
                        <x-primary-button type="submit">{{ __('検索') }}</x-primary-button>
                    </div>
                </form>

            </div>

            <div class="grid grid-cols-1 gap-6">
                @foreach ($slnbikes as $slnbike)
                <a href="{{ route('sln.show', $slnbike) }}">
                    <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-6">
                                <!-- 左: 画像 -->
                                <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                    <img src="{{ empty($slnbike->image_path) ? asset('images/no-image.png') : $slnbike->image_path }}" alt="プレビュー画像">
                                </div>
                                <!-- 中央: 情報 -->
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>車種：</strong>{{ $slnbike->model }}</p>
                                    <p><strong>メーカー名：</strong>{{ $slnbike->manufacturer }}</p>
                                    <p><strong>車体名：</strong>{{ $slnbike->model_name }}</p>
                                    <p><strong>盗難場所：</strong>{{ $slnbike->stolen_location }}</p>
                                </div>
                            </div>

                            <!-- 右上: 投稿ユーザIDと日時 -->
                            <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                <p><strong>投稿ユーザID：</strong>{{ $slnbike->user_id }}</p>
                                <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>

            <div class="mt-6">
                {{ $slnbikes->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>