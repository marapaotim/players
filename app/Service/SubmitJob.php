<?php

namespace App\Service;

use App\Job\SaveData;

class SubmitJob
{
	public function handle()
	{
		\Log::debug("Start Cron Job");
		$service = app(PlayerService::class); 
		dispatch(new SaveData($service));
	}
}
