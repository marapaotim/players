<?php
namespace App\Repositories\Contracts;

interface PlayerRepositoryInterface
{
   public function all();
   public function insert($data);
   public function find($id);
}
