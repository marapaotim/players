<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\PlayerServiceInterface;
use Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlayerController extends Controller
{
    private $service;

    public function __construct(PlayerServiceInterface $service)
    {
        $this->service = $service;
    }

    public function all()
    {
        return Response::json($this->service->all());
    }

    public function find($id)
    {
        try {
            $data = $this->service->find($id);
        } catch (ModelNotFoundException $exception) {
            return Response::json(['error' => $exception->getMessage()], 404);
        }
        return Response::json($data);
    }
}
