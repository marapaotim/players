<?php

namespace App\Services;

use App\Services\Contracts\GetDataInterface;
use App\Services\Contracts\ImportPlayerServiceInterface;
use App\Repositories\Contracts\PlayerRepositoryInterface;

class ImportPlayerService implements ImportPlayerServiceInterface
{
    private $repository;
    private $data;

    public function __construct(PlayerRepositoryInterface $repository, GetDataInterface $data)
    {
        $this->repository = $repository;
        $this->data = $data;
    }

    public function submitData()
    {
        $data = $this->data->getData();
        $this->repository->insert($data);
    }
}
