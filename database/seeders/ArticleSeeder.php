<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(["name" => "test tag"]);
        Article::create([
            "title" => "testing",
            "content" => "testing",
            'user_id' => 1,

        ]);

        DB::insert('insert into article_tag (id, article_id,tag_id) values (?, ?,?)', [1, 1, 1]);
    }
}
