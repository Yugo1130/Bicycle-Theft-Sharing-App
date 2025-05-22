<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            放置自転車詳細
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                        <p><strong>投稿ユーザID：</strong>{{ $abdbike->user_id }}</p>
                        <p><strong>最終更新日：</strong>{{ $abdbike->updated_at }}</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow sm:rounded-lg">

                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-6">
                                <!-- 左: 画像 -->
                                <div class="flex justify-center items-center" style="width: 400px;">
                                    <img src="{{ empty($abdbike->image_path) ? asset('images/no-image.png') : $abdbike->image_path }}"
                                        alt="プレビュー画像"
                                        class="max-h-full object-contain"
                                        style="max-width: 400px; height: auto;">
                                </div>

                                <!-- 中央: 情報 -->
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>車種：</strong>{{ $abdbike->model }}</p>
                                    <p><strong>メーカー名：</strong>{{ $abdbike->manufacturer }}</p>
                                    <p><strong>車体名：</strong>{{ $abdbike->model_name }}</p>
                                    <p><strong>色：</strong>{{ $abdbike->color }}</p>
                                    <p><strong>車体番号：</strong>{{ $abdbike->frame_num }}</p>
                                    <p><strong>防犯登録番号：</strong>{{ $abdbike->prefecture }} {{ $abdbike->bouhan_num }}</p>
                                    <p><strong>発見日時：</strong>{{ $abdbike->found_at }}</p>
                                    <p><strong>発見場所：</strong>{{ $abdbike->found_location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    車体特徴
                    <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                        <p>{{ $abdbike->features }}</p>
                    </div>
                    その他
                    <div class="bg-white p-6 rounded shadow sm:rounded-lg">
                        <p>{{ $abdbike->other }}</p>
                    </div>
                </div>
                @auth
                @if (Auth::id() === $abdbike->user_id)
                <div class="w-full pt-4 flex justify-end gap-4">
                    <a href="{{ route('abd.edit', $abdbike) }}">
                        <x-secondary-button type="button">編集</x-secondary-button>
                    </a>
                    <form action="{{ route('abd.delete', $abdbike) }}" method="POST" id="form_{{ $abdbike->id }}">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="button" onclick="deleteAbdbike({{ $abdbike->id }})">{{ __('削除') }}</x-danger-button>
                    </form>
                </div>
                @endif
                @endauth

            </div>
            <div class="w-full flex justify-center">
                <div class="footer">
                    <a href="{{ route('abd.index') }}">
                        <x-secondary-button type="button">一覧へ戻る</x-secondary-button>
                    </a>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2>コメント作成</h2>
                @if (Auth::check())
                <form action="{{ route('abdcmt.store', $abdbike) }}" method="POST">
                    @csrf
                    <textarea name="comment" rows="4" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"></textarea>
                    <div class="w-full pt-4 flex justify-end">
                        <x-primary-button type="submit">投稿</x-primary-button>
                    </div>
                </form>
                @else
                @php
                session(['url.intended' => url()->full()]);
                @endphp
                <a href="{{ route('login') }}" class="block text-blue-600 underline">コメントを投稿するにはログインしてください．</a>
                @endif
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2>コメント一覧</h2>
                <div class='comments'>
                    @foreach ($comments as $comment)
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="comment">
                            <p><small>投稿者ID: {{ $comment->user_id }} 投稿日時: {{ $comment->created_at }}</small></p>
                            <p>{{ $comment->comment }}</p>
                            @auth
                            @if (Auth::id() === $comment->user_id)
                            <div class="w-full pt-4 flex justify-end">
                                <form action="{{ route('abdcmt.delete', $comment) }}" id="form_{{ $comment->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="button" onclick="deletecomment({{ $comment->id }})">{{ __('削除') }}</x-danger-button>
                                </form>
                            </div>
                            @endif
                            @endauth
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full flex justify-center">
                <div class="footer">
                    <a href="{{ route('abd.index') }}">
                        <x-secondary-button type="button">一覧へ戻る</x-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 厳格モード有効
        'use strict';

        function deleteAbdbike(id) {
            // confirm()でダイアログ出力
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }

        function deletecomment(id) {
            // confirm()でダイアログ出力
            if (confirm('コメントを削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>