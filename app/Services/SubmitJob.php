<?php

namespace App\Services;

use App\Jobs\SaveData;
use App\Services\Contracts\ImportPlayerServiceInterface as ImportPlayerService;
use App\Services\Contracts\SubmitJobInterface;

class SubmitJob implements SubmitJobInterface
{
	public function handle()
	{
		\Log::debug("Start Cron Job");
		$service = app(ImportPlayerService::class); 
		dispatch(new SaveData($service));
	}
}
