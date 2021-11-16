<?php

namespace App\Repositories\Contracts;



interface TagRepositoryInterface
{
    public function getAll();


    public function get($id);


    public function delete($id);

    public function save(array $data);

    public function update($id, array $data);
}
