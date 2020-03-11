<?php

namespace App\Services;

use App\Model\Player;
use App\Formatters\Contracts\FormatterInterface;
use App\Services\Contracts\GetDataInterface;

class GetPlayerDataService implements GetDataInterface
{
    private $formatter;

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    public function getData()
    {
        $data = file_get_contents(Player::PLAYER_API);
        $data = json_decode($data, true);
        return $this->formatter->format($data);
    }
}
