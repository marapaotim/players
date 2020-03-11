<?php
namespace App\Services\Contracts;

interface PlayerServiceInterface
{
   public function all();

   public function find($id);
}
