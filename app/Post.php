<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment'); //1対多
    }

    public function show($post_id)
{
    $post = Post::findOrFail($post_id);

    return view('posts.show', [
        'post' => $post,
    ]);
}


}
