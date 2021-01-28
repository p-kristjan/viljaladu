<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarEditRequest;
use App\Models\CarHistory;
use App\Models\exit_mass;
use App\Http\Requests\CarCreateRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::orderBy('id')->get();
        return view('cars.index', compact('cars'));
    }

    public function create(){
        return view ('cars.create');
    }

    public function store(CarCreateRequest $request){
        Car::create($request->all());
        return redirect(route('car.index'))->with('message', 'Car created successfully!');
    }

    public function destroy(Car $car){
        //$car->exit_masses->each->delete();
        $car->delete();
        return redirect()->back()->with('message', 'Car deleted');
    }

    public function edit(Car $car){
        return view ('cars.edit', compact('car'));
    }

    public function update(CarEditRequest $request, Car $car){
        $car->update(['exit_mass'=>$request->exit_mass, 'exited'=>true]);

//        $car->exit_masses()->each(function ($exit_mass) {$exit_mass->delete();});
//
//        if($request->exitMassName){
//            foreach ($request->exitMassName as $key => $value){
//                $car->exit_masses()->create(['exit_mass'=>$value]);
//                $id = $request->exitMassId[$key];
//                if($id){
//                    $exit_mass = exit_mass::find($id);
//                    $exit_mass->update(['exit_mass' => $value]);
//                } else {
//                    $car->exit_masses()->create(['exit_mass'=>$value]);
//                }
//
//            }
//        }
        return redirect(route('car.index'))->with('message', 'Car updated!');
    }

    public function show(Car $car){
        return view('cars.show', compact('car'));
    }
}
