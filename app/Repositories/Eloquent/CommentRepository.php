<?php

namespace App\Repositories\Eloquent;


use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getAll()
    {
        return $this->comment->all();
    }

    public function get($id)
    {
        return $this->comment->findOrFail($id);
    }


    public function save(array $attributes)
    {
        return $this->comment->create($attributes);
    }
    public function update($id, array $attributes)
    {
        $comment = $this->comment->findOrFail($id);
        $comment->update($attributes);
        return $comment;
    }

    public function delete($id)
    {
        return $this->comment->findOrFail($id)->delete();
    }
}
