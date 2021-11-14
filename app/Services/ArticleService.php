<?php

namespace App\Services;



use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;

class ArticleService
{
    private $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    public function all()
    {
        return $this->articleRepository->getAll();
    }
    // public function saveData($data)
    // {

    //     return $this->articleRepository->save($data);
    // }
    // public function findById($modelId)
    // {
    //     return $this->articleRepository->get($modelId);
    // }
    // public function updateData(Article $Article, $data)
    // {

    //     return $this->articleRepository->update($Article, $data);
    // }
    // public function deleteById($modelId)
    // {
    //     return $this->articleRepository->delete($modelId);
    // }
}
