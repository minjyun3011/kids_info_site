<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">

        @if (session('notice'))
            <div class="bg-blue-100 border-blue-500 text-blue-700 border-l-4 p-4 my-2">
                {{ session('notice') }}
            </div>
        @endif
        <x-validation-errors :errors="$errors" />
        <article class="mb-2">
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                {{ $post->kid_name }}君</h1>
            <h3>担当:{{ $post->teacher }}</h3>
            <h3>{{ $post->category }}</h3>
            <h3>{{ $post->title }}</h3>
            <h3>{{ $post->evaluation }}</h3>

            <img src="{{ Storage::url('images/posts/' . $post->image) }}" alt="" class="mb-4">
            <p class="text-gray-700 text-base">{!! nl2br(e($post->body)) !!}</p>
        </article>
        <div class="flex flex-row text-center my-4">
            <a href="{{ route('posts.edit', $post) }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
        </div>
    </div>
</x-app-layout>
