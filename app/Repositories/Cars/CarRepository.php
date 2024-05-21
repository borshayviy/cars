<?php

namespace App\Repositories\Cars;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarRepository implements CarRepositoryInterface
{

    public function getList(array $filter = [])
    {
        return Cars::where('year', '>', $filter['year_from'] ?? 0)
            ->orderBy($filter['sort'] ?? 'id', 'ASC')
            ->get();
    }

    public function getOne(string $name)
    {
        return Cars::where('name',$name)->first;
    }

    public function store(array $data)
    {
        return Cars::create($data);
    }

    public function destroy(string $name)
    {
        Cars::destroy($name);
    }

    public function update(string $name, array $data)
    {
        return Cars::where('name', $name)
            ->update($data);
    }
}
