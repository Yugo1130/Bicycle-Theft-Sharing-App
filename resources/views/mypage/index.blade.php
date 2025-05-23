<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            マイページ
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <p>投稿一覧</p>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <p>盗難自転車</p>
                <div class="grid grid-cols-1 gap-6">
                    @if ($slnbikes->isEmpty())
                    <p class="text-gray-500">コメントはまだありません.</p>
                    @endif
                    @foreach ($slnbikes as $slnbike)
                    <a href="{{ route('sln.show', $slnbike) }}">
                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex gap-6">
                                    <!-- 左: 画像 -->
                                    <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                        <img src="{{ empty($slnbike->image_path) ? asset('images/no-image.png') : $slnbike->image_path }}"
                                            alt="プレビュー画像"
                                            class="max-h-full object-contain">
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
                                    <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
                                    <p><strong>投稿日：</strong>{{ $slnbike->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <p>放置自転車</p>
                <div class="grid grid-cols-1 gap-6">
                    @if ($abdbikes->isEmpty())
                    <p class="text-gray-500">コメントはまだありません.</p>
                    @endif
                    @foreach ($abdbikes as $abdbike)
                    <a href="{{ route('abd.show', $abdbike) }}">
                        <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex gap-6">
                                    <!-- 左: 画像 -->
                                    <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                        <img src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}"
                                            alt="プレビュー画像"
                                            class="max-h-full object-contain">
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
                                    <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                                    <p><strong>投稿日：</strong>{{ $abdbike->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <p>コメントした投稿</p>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <p>盗難自転車</p>
                <div class="grid grid-cols-1 gap-6">
                    <div class='slncomments'>
                        @if ($slncomments->isEmpty())
                        <p class="text-gray-500">コメントはまだありません.</p>
                        @endif
                        @foreach ($slncomments as $bicycleId => $comments)
                        <a href="{{ route('sln.show', $comments->first()->stolen_bicycle) }}">
                            <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex gap-6">
                                        <!-- 左: 画像 -->
                                        <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                            <img src="{{ empty($comments->first()->stolen_bicycle->image_path) ? asset('images/no-image.png') : $comments->first()->stolen_bicycle->image_path }}"
                                                alt="プレビュー画像"
                                                class="max-h-full object-contain">
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
                                        <p><strong>最終更新日：</strong>{{ $slnbike->updated_at }}</p>
                                        <p><strong>投稿日：</strong>{{ $slnbike->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <p>放置自転車</p>
                <div class="grid grid-cols-1 gap-6">
                    <div class='abdcomments'>
                        @if ($abdcomments->isEmpty())
                        <p class="text-gray-500">コメントはまだありません.</p>
                        @endif
                        @foreach ($abdcomments as $bicycleId => $comments)
                        <a href="{{ route('abd.show', $comments->first()->abandoned_bicycle) }}">
                            <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex gap-6">
                                        <!-- 左: 画像 -->
                                        <div class="flex justify-center items-center" style="width: 300px; height: 200px;">
                                            <img src="{{ empty($comments->first()->abandoned_bicycle->image_path) ? asset('images/no-image.png') : $comments->first()->abandoned_bicycle->image_path }}"
                                                alt="プレビュー画像"
                                                class="max-h-full object-contain">
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
                                        <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                                        <p><strong>投稿日：</strong>{{ $abdbike->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>