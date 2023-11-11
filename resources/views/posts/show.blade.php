<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            中山功太君
        </h2>
        <h2 style="text-align:right">担当：佐藤</h2>
    </x-slot>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">

        @if (session('notice'))
            <div class="bg-blue-100 border-blue-500 text-blue-700 border-l-4 p-4 my-2">
                {{ session('notice') }}
            </div>
        @endif
        <x-validation-errors :errors="$errors" />
        <article class="mb-2">
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                {{ $post->category }}</h1>
            <div class="flex space-x-4">
                <div class="flex-1">
                    <h3
                        class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-3.5xl break-words mb-4">
                        {{ $post->title }}</h3>
                </div>
                <div class="flex-1">
                    <h3
                        class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-3.5xl break-words mb-4">
                        {{ $post->evaluation }}</h3>
                </div>
            </div>
        </article>
        <div class="teacher-quote">
            <div class="quote-header">担当の先生からの一言</div>
            <p class="quote-text">{{ $post->detail }}</p>
        </div>
        <div class="flex justify-end mt-4">
            <div class="flex flex-row mr-5">
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">編集</a>
                <a href="{{ route('posts.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">一覧に戻る</a>
            </div>
        </div>
</x-app-layout>
