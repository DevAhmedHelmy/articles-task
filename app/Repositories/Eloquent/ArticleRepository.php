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

        return $this->article->with("comments")->latest()->get();
    }

    public function get($id)
    {
        return $this->article->findOrFail($id);
    }


    public function save(array $attributes)
    {

        $article = $this->article->create($attributes);

        return $article;
    }
    public function update($id, array $attributes)
    {
        $article = $this->article->findOrFail($id);
        $article->update($attributes);
        return  $article;
    }

    public function delete($id)
    {
        return $this->article->findOrFail($id)->delete();
    }
}
