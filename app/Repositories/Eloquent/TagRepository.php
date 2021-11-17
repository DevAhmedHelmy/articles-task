<?php

namespace App\Repositories\Eloquent;


use App\Models\Tag;
use App\Repositories\Contracts\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    private $tag;
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getAll()
    {
        return $this->tag->all();
    }

    public function get($id)
    {
        return $this->tag->findOrFail($id);
    }


    public function save(array $attributes)
    {
        return $this->tag->create($attributes);
    }
    public function update($id, array $attributes)
    {
        $tag = $this->tag->findOrFail($id);
        $tag->update($attributes);
        return $tag;
    }

    public function delete($id)
    {
        return $this->tag->findOrFail($id)->delete();
    }
}
