<?php

namespace App\Repository;

use App\Model\Player;

class PlayerRepository extends Repository
{
    protected $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->select('id', \DB::raw('CONCAT(first_name, " ", second_name) as full_name'))->get();
    }
}
