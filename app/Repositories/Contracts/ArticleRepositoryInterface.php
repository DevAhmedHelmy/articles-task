<?php

namespace App\Repositories\Contracts;

use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function getAll();


    public function get($id);


    public function delete($id);

    public function save(array $data);

    public function update($id, array $data);
}
