<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\Cars\CarRepositoryInterface;

class CarsController extends Controller
{
    private $rep;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->rep = $repository;
    }

    public function index()
    {
        $result = $this->rep->getList();
        return response()->json($result);
    }

    public function show(int $id)
    {
        //todo одна машина
    }

    public function store(int $id)
    {
        //todo обновление
    }

    public function destroy(int $id)
    {
        //todo удаление
    }
}
