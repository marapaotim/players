<?php

namespace App\Service;

use App\Repository\PlayerRepository;

abstract class AbstractService
{
	abstract protected function getImportData();

	public function submitData()
	{
		$data = $this->getImportData();
		$this->repository->insert($data);
	}
}
