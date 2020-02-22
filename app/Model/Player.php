<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'id', 'first_name', 'second_name', 'form', 'total_points', 'influence', 'creativity',
        'threat', 'ict_index'
    ];
}
