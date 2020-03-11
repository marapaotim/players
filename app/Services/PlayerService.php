<?php

namespace App\Services;

use App\Repositories\Contracts\PlayerRepositoryInterface;
use App\Services\Contracts\PlayerServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlayerService implements PlayerServiceInterface
{
    private $repository;

    public function __construct(PlayerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        $data = $this->repository->find($id);
        if (empty($data)) {
            throw new ModelNotFoundException("No Player Found for ID " . $id);
        }
        
        return $data;
    }
}
