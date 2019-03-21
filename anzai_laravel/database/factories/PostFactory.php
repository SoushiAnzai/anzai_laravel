<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        //
        'title' => '投稿のタイトル',
        'content' => "本文です。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
    ];
});
