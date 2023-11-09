<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            中山功太君
        </h2>
        <h2 style="text-align:right">担当：佐藤</h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="border p-4" id="dynamic-content">
                <!-- 動的なコンテンツがここに表示されます -->
            </div>
        </div>
    </div>

    <script>
        // カテゴリのリンクがクリックされたときの処理
        document.addEventListener('DOMContentLoaded', function () {
            var categoryLinks = document.querySelectorAll('.category-link');

            categoryLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    var category = link.getAttribute('data-category');
                    loadDynamicContent(category);
                });
            });
        });

        // 動的なコンテンツを取得して表示する関数
        function loadDynamicContent(category) {
            fetch('{{ url("categories") }}/' + category)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('dynamic-content').innerHTML = data;
                });
        }
    </script>
</x-app-layout>
