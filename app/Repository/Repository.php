<?php

namespace App\Repository;

class Repository
{
    public function insert($data)
    {
        $this->model->insert($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
