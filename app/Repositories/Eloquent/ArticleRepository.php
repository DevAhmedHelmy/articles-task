<?php

namespace App\Repositories\Eloquent;

use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    private $article;
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getAll()
    {
        return $this->article->all();
    }

    public function get($id)
    {
        return $this->article->findOrFail($id);
    }


    public function save(array $attributes)
    {
        return $this->article->create($attributes);
    }
    public function update($id, array $attributes)
    {
        return $this->article->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->article->findOrFail($id)->delete();
    }
}
