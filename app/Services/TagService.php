<?php

namespace App\Services;

use App\Repositories\Contracts\TagRepositoryInterface;

class TagService
{
    private $tagsRepository;
    public function __construct(TagRepositoryInterface $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }
    public function all()
    {
        return $this->tagsRepository->getAll();
    }
    public function saveData($data)
    {

        return $this->tagsRepository->save($data);
    }
    public function findById($modelId)
    {
        return $this->tagsRepository->get($modelId);
    }
    public function updateData($id, $data)
    {

        return $this->tagsRepository->update($id, $data);
    }
    public function deleteById($modelId)
    {
        return $this->tagsRepository->delete($modelId);
    }
}
