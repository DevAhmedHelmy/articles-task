<?php

namespace App\Services;

use App\Repositories\Contracts\TagRepositoryInterface;

class TagService
{
    private $tagRepository;
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public function all()
    {

        return $this->tagRepository->getAll();
    }
    public function saveData($data)
    {

        return $this->tagRepository->save($data);
    }
    public function findById($modelId)
    {
        return $this->tagRepository->get($modelId);
    }
    public function updateData($id, $data)
    {

        return $this->tagRepository->update($id, $data);
    }
    public function deleteById($modelId)
    {
        return $this->tagRepository->delete($modelId);
    }
}
