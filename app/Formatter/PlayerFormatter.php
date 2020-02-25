<?php

namespace App\Formatter;

class PlayerFormatter
{
    public function format($data)
    {
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
}
