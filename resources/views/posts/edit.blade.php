<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            中山功太君
        </h2>
        <h2 style="text-align:right">担当：佐藤</h2>
    </x-slot>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-left text-lg font-bold pt-6 tracking-widest">評価の編集</h2>
        <x-validation-errors :errors="$errors" />

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col pt-3 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="flex mb-4">
                <div class="flex-1">
                    <label class="block text-gray-700 text-sm mb-2" for="category">
                        {{ old('category', $post->category) }}
                    </label>
                    <label
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3">
                        {{ old('title', $post->title) }}
                    </label>

                </div>
                <div class="flex-1 mr-4">
                    <label class="block text-gray-700 text-sm mb-2" for="evaluation">
                        評価
                    </label>
                    <input type="text" name="evaluation"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3 text-sm"
                        required placeholder="評価" value="{{ old('evaluation', $post->evaluation) }}">

                </div>
            </div>
            <div class="teacher-quote">
                <div class="quote-header">担当の先生からの一言</div>
                <textarea type="text" name="detail"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3 text-sm"
                    required placeholder="(任意)">{{ old('detail', $post->detail) }}</textarea>
            </div>
            <div class="flex justify-start mt-4">
                <!-- 更新ボタン -->
                <input type="submit" value="更新"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">

                <!-- 戻るボタン -->
                <input type="button" value="一つ前に戻る"
                    onclick="location.href='{{ route('posts.show', ['post' => $post]) }}'"
                    class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">

            </div>


        </form>
    </div>
</x-app-layout>
