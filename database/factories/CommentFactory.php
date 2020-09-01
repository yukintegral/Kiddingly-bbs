<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => "本文のテストです。これ実装するの大変なんよ コメントのほうね",
    ];
});
