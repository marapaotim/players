<?php

namespace App\Services;

use App\Services\Contracts\GetDataInterface as GetPlayerData;
use App\Services\Contracts\ImportPlayerServiceInterface;
use App\Repositories\Contracts\PlayerRepositoryInterface as PlayerRepository;

class ImportPlayerService implements ImportPlayerServiceInterface
{
    private $repository;
    private $data;

    public function __construct(PlayerRepository $repository, GetPlayerData $data)
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
