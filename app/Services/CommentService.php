<?php

namespace App\Services;

use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentService
{
    private $commentRepository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function all()
    {

        return $this->commentRepository->getAll();
    }
    public function saveData($data)
    {

        return $this->commentRepository->save($data);
    }
    public function findById($modelId)
    {
        return $this->commentRepository->get($modelId);
    }
    public function updateData($id, $data)
    {

        return $this->commentRepository->update($id, $data);
    }
    public function deleteById($modelId)
    {
        return $this->commentRepository->delete($modelId);
    }
}
