<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarForm;
use App\Http\Requests\UpdateCarForm;
use App\Models\Cars;
use App\Repositories\Cars\CarRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CarsController
{
    private $rep;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->rep = $repository;
    }

    public function index(Request $request)
    {
        if ($request->filled('updateYear') && $request->input('updateYear') === 1) {
            Artisan::call('car:synchronization');
        }
        return view('cars.index', [
            'cars' => $this->rep->getList($request->all())
        ]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CreateCarForm $request)
    {
        $car = $this->rep->store($request->all());
        return redirect()->back()->with('alert', 'Ваша машина создана: ' . $car->name);
    }

    public function update(string $name, Request $request)
    {
        $model = $this->rep->getOne('name');
        if (is_null($model)) {
           return redirect()->route('cars-home')->with('error', 'Такой машины нет');
        }
        return view('cars.update', [
            'car' => $model
        ]);
    }

    public function updateStore(string $name, UpdateCarForm $request)
    {
        $this->rep->update($name, $request->all());
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $this->rep->destroy($request->input('name'));
        return redirect()->back();
    }

    public function show(string $name)
    {
        return view('cars.show', [
            'car' => $this->rep->getOne($name)
        ]);
    }
}
