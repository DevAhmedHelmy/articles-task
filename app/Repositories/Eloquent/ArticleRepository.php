<?php

namespace App\Repositories\Eloquent;

use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{

    public function getAll()
    {
        return Article::all();
    }


    // public function get(Article $Article);


    // public function delete(Article $Article);

    // public function save(array $data);

    // public function update(Article $Article);
}
