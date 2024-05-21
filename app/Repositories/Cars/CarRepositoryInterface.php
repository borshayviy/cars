<?php

namespace App\Repositories\Cars;

use Illuminate\Http\Request;

interface CarRepositoryInterface
{
    public function getList(array $filter = []);
    public function getOne(string $name);
    public function store(array $data);
    public function update(string $name, array $data);
    public function destroy(string $name);
}
