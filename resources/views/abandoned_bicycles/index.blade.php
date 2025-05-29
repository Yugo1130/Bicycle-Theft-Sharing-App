<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                発見された自転車の情報です．
            </h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('sln.create') }}" class="text-blue-600 underline">
                    盗難自転車情報登録はこちら
                </a>
                <a href="{{ route('abd.create') }}" class="text-blue-600 underline">
                    放置自転車情報登録はこちら
                </a>
                @guest
                <span class="text-sm text-gray-600">※ログインが必要です．</span>
                @endguest
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <!-- 画面中央に寄せて読みやすくする -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- 白背景のカード風のブロックを作る -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form action="{{ route('abd.index') }}" method="GET">
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
                        <a href="{{ route('abd.index') }}">
                            <x-secondary-button type="button">{{ __('絞り込み条件クリア') }} </x-secondary-button>
                        </a>
                        <x-primary-button type="submit">{{ __('検索') }}</x-primary-button>

                    </div>
                </form>

            </div>

            <div class="grid grid-cols-1 gap-6">
                @foreach ($abdbikes as $abdbike)
                <a href="{{ route('abd.show', $abdbike) }}">
                    <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-6">
                                <!-- 左: 画像 -->
                                <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                    <img src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}" alt="プレビュー画像">
                                </div>

                                <!-- 中央: 情報 -->
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>車種：</strong>{{ $abdbike->model }}</p>
                                    <p><strong>メーカー名：</strong>{{ $abdbike->manufacturer }}</p>
                                    <p><strong>車体名：</strong>{{ $abdbike->model_name }}</p>
                                    <p><strong>盗難場所：</strong>{{ $abdbike->found_location }}</p>
                                </div>
                            </div>

                            <!-- 右上: 投稿ユーザIDと日時 -->
                            <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                <p><strong>投稿ユーザ：</strong>{{ $abdbike->user->name }} (ID:{{$abdbike->user_id}})</p>
                                <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $abdbikes->links('vendor.pagination.tailwind') }}
            </div>
        </div>
        <!-- <div class="fixed bottom-4 inset-x-0 w-full flex justify-center z-50"> 
            <button
                type="button"
                onclick="saveConditions()"
                class="bg-red-600 hover:bg-red-700 text-white text-lg font-semibold py-3 px-6 rounded-full shadow-lg transition w-1/2 max-w-[600px]">
                検索条件を保存
            </button>
        </div> -->
    </div>


</x-app-layout>