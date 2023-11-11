<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{



    public function processRecordsWithSameKidName()
    {
        $same_kid_name = '中山功太';

        $records = Post::where('kid_name', $same_kid_name)->get();

        // 取得したレコードを処理するためのコードをここに追加
        foreach ($records as $record) {
            // レコードの処理を行う
        }

        // レコードの処理が終わったら、適切なレスポンスを返すか、ビューを表示するなどの操作を行います。
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // {
        //     $posts = Post::all();
        //     $groupedPosts = $posts->groupBy('category');

        //     return view('posts.index', compact('groupedPosts'));

        //     return view('posts.index', compact('posts'));
        // }
        // URLから取得したカテゴリがあれば、対応するカテゴリの記事を表示
        $category = request()->segment(2); // URLの2番目のセグメント（posts/{category}）を取得

        if ($category) {
            return $this->getPostsByCategory($category);
        }

        // カテゴリがない場合は通常の一覧表示
        $posts = Post::all();
        $groupedPosts = $posts->groupBy('category');

        return view('posts.index', compact('groupedPosts'));
    }
    public function getPostsByCategory($category)
    {
        $posts = Post::where('category', $category)->get();

        return view('posts.category', compact('category', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // コントローラの store メソッド
    public function store(StorePostRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;

        DB::beginTransaction();
        try {
            // 登録
            $post->save();

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()
            ->route('posts.show', $post)
            ->with('notice', '記事を登録しました');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);


        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // PostController.php

    // PostController.php

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);

        if ($request->user()->cannot('update', $post)) {
            return redirect()->route('posts.show', $post)
                ->withErrors('評価担当以外は情報を更新できません');
        }

        // 更新前の値を取得
        $old_evaluation = $post->evaluation;

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 更新
            $post->update($request->all());

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        // ビューに渡すデータに追加
        // $data = [
        //     'post' => $post,
        //     'old_evaluation' => $old_evaluation,
        // ];

        return redirect()->route('posts.show', $post)
            ->with(compact('old_evaluation'))
            ->with('notice', '評価を更新しました');
    }

    public function getOriginalValue($column)
    {
        return $this->getOriginal($column);
    }
}
