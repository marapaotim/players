<?php

namespace App\Service;

use App\Repository\PlayerRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlayerService extends AbstractService implements PlayerServiceInterface
{
    protected $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function getImportData()
    {
        $data = file_get_contents('https://fantasy.premierleague.com/api/bootstrap-static/');
        $data = json_decode($data, true);
        $players = [];
        foreach ($data["elements"] as $value) {
            $players[] = [
                'id' => $value['id'],
                'first_name' => $value['first_name'],
                'second_name' => $value['second_name'],
                'form' => $value['form'],
                'total_points' => $value['total_points'],
                'influence' => $value['influence'],
                'creativity' => $value['creativity'],
                'threat' => $value['threat'],
                'ict_index' => $value['ict_index']
            ];
        }
        return $players;
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
