<?php

namespace App\Service;

use App\Repository\PlayerRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Model\Player;
use App\Formatter\PlayerFormatter;

class PlayerService extends AbstractService implements PlayerServiceInterface
{
    protected $repository;

    private $formatter;

    public function __construct(PlayerRepository $repository, PlayerFormatter $formatter)
    {
        $this->repository = $repository;
        $this->formatter = $formatter;
    }

    protected function getImportData()
    {
        $data = file_get_contents(Player::PLAYER_API);
        $data = json_decode($data, true);
        return $this->formatter->format($data);
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
