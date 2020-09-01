<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //投稿を作成日時の好順で取得して、posts.indexに渡す
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', ['posts' => $posts]);
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
    }


    public function create()
    {
        return view('posts.create');
    }


    //記事追加後はトップページにリダイレクト
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        Post::create($params);

        return redirect()->route('top');
    }

    //記事の閲覧
    public function show($post_id)
{
    $post = Post::findOrFail($post_id);

    return view('posts.show', [
        'post' => $post,
    ]);
}

    //投稿内容の編集
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show', ['post' => $post]);
}

public function destroy($post_id)
{
    $post = Post::findOrFail($post_id);

    \DB::transaction(function () use ($post) {
        $post->comments()->delete();
        $post->delete();
    });

    return redirect()->route('top');
}



}
