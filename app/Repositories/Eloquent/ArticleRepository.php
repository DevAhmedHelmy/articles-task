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

        return $this->article->with("tags")->get();
    }

    public function get($id)
    {
        return $this->article->findOrFail($id);
    }


    public function save(array $attributes)
    {

        $article = $this->article->create($attributes);
        if ($article && $attributes['tags']) $article->tags()->sync($attributes['tags']);
        return $article;
    }
    public function update($id, array $attributes)
    {
        $article = $this->article->findOrFail($id);
        if ($article->update($attributes) && $attributes['tags']) $article->tags()->sync($attributes['tags']);
        return $article;
    }

    public function delete($id)
    {
        return $this->article->findOrFail($id)->delete();
    }
}
