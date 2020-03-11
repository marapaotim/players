<?php

namespace App\Repositories;

use App\Model\Player;
use App\Repositories\Contracts\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
    private $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->select('id', \DB::raw('CONCAT(first_name, " ", second_name) as full_name'))->get();
    }

    public function insert($data)
    {
        $this->model->insert($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
