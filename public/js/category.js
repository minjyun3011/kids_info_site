// public/js/category.js
function showCategory(category) {
    // カテゴリに属する記事を取得する処理（例：Ajaxリクエスト）
    // 以下は仮のコードで、実際のプロジェクトでは適切な方法でデータを取得する必要があります。

    // 仮のデータ
    var postsInCategory = [
        { title: '記事1', evaluation: '5' },
        { title: '記事2', evaluation: '4' },
        // 他の記事...
    ];

    // 記事を表示する処理
    var container = document.getElementById('categoryPostsContainer');
    container.innerHTML = ''; // 現在表示されている記事をクリア

    postsInCategory.forEach(function(post) {
        var article = document.createElement('article');
        var link = document.createElement('a');
        link.href = '#'; // 詳細なリンク先は適切に設定する必要があります
        var h3 = document.createElement('h3');
        h3.textContent = post.title + ' ' + post.evaluation;

        link.appendChild(h3);
        article.appendChild(link);
        container.appendChild(article);
    });
}
