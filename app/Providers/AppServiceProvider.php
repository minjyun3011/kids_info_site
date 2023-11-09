<?php
namespace App\Providers;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;  // View クラスをインポート

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ビューコンポーザを設定
        View::composer('posts.index', function ($view) {
            $posts = Post::all(); // Post モデルから必要なデータを取得する (必要に応じて修正)
            $view->with('posts', $posts); // 'posts' 変数をビューに渡す
        });
    }
}
