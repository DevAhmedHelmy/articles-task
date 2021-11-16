<?php

namespace App\Services;



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
    public function saveData($data)
    {

        return $this->articleRepository->save($data);
    }
    public function findById($modelId)
    {
        return $this->articleRepository->get($modelId);
    }
    public function updateData($id, $data)
    {

        return $this->articleRepository->update($id, $data);
    }
    public function deleteById($modelId)
    {
        return $this->articleRepository->delete($modelId);
    }
}
