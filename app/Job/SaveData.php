<?php

namespace App\Job;

use App\Service\PlayerService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SaveData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $service;

    public function __construct(PlayerService $service)
    {
        $this->service = $service;
    }

    public function handle()
    {
        $this->service->submitData();
    }
}
