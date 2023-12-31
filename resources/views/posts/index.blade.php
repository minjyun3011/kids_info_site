<x-app-layout>
    <script src="{{ asset('js/custom.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            中山功太君
        </h2>
        <h2 style="text-align:right">担当：佐藤</h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @php $categoryGroups = []; @endphp
            @foreach ($posts as $index => $post)
                <!-- カテゴリが存在しない場合、新しいグループを始める -->
                @if (!isset($categoryGroups[$post->category]))
                    <div class="border p-4">
                        <h2 class="font-bold text-xl mb-2">{{ $post->category }}</h2>
                        <!-- 各カテゴリの記事を保持する変数 -->
                        @php $categoryGroups[$post->category] = []; @endphp
                @endif
                <!-- カテゴリの追加記事 -->
                <article>
                    <div style="display: flex; flex-direction: column; margin-bottom: 10px;">
                        <a href="{{ route('posts.show', ['post' => $post]) }}"
                            style="display: flex; justify-content: space-between; padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: inherit;">
                            <h3 style="margin: 0;">{{ $post->title }}</h3>
                            <span style="align-self: flex-end;">{{ $post->evaluation }}</span>
                        </a>
                    </div>


                </article>
                <!-- 最後の記事の場合、グループを終了 -->
                @if ($index === count($posts) - 1 || $post->category !== $posts[$index + 1]->category)
        </div>
        @endif
        @endforeach
        <!-- カテゴリごとの記事を表示 -->
        @foreach ($categoryGroups as $category => $group)
            @if (!empty($group))
                <!-- グループに記事がある場合のみ表示 -->
                <div class="border p-4">
                    <h2 class="font-bold text-xl mb-2">{{ $category }}</h2>
                    @foreach ($group as $post)
                        <article>
                            <a href="{{ route('posts.show', ['post' => $post]) }}">
                                <h3>{{ $post->title }} {{ $post->evaluation }}</h3>

                            </a>
                        </article>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
    </div>
</x-app-layout>
