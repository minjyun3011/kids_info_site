<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            中山功太君
        </h2>
        <h2 style="text-align:right">担当：佐藤</h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @php $currentCategory = null; @endphp
            @foreach ($posts as $index => $post)
                @if ($index === 0 || $post->category !== $posts[$index - 1]->category)
                    <!-- 新しいカテゴリの始まり -->
                    @if ($currentCategory !== null)
                        </div><!-- カテゴリの終わり -->
                    @endif
                    <div class="border p-4">
                        <h2 class="font-bold text-xl mb-2">{{ $post->category }}</h2>
                        <article>
                            <a href="{{ route('posts.show', $post) }}">
                                <h3>{{ $post->title }} {{ $post->evaluation }}</h3>
                                <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                                    <span class="text-red-400 font-bold">
                                        {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->updated_at ? 'NEW' : '' }}
                                    </span>
                                    {{ $post->updated_at }}
                                </p>
                            </a>
                        </article>
                        @php $currentCategory = $post->category; @endphp
                @else
                    <!-- 同じカテゴリの追加記事 -->
                    <article>
                        <a href="{{ route('posts.show', $post) }}">
                            <h3>{{ $post->title }} {{ $post->evaluation }}</h3>
                            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                                <span class="text-red-400 font-bold">
                                    {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->updated_at ? 'NEW' : '' }}
                                </span>
                                {{ $post->updated_at }}
                            </p>
                        </a>
                    </article>
                @endif
            @endforeach
            @if ($currentCategory !== null)
                </div><!-- 最後のカテゴリの終わり -->
            @endif
        </div>
    </div>
</x-app-layout>




