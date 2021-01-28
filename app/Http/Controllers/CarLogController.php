<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarLogController extends Controller
{
    public function index(){
        $cars = Car::orderBy('id')->get();
        return view('carlogs.index', compact('cars'));
    }

    public function show(){
        $cars = Car::orderBy('id')->get();
        return view('carlogs.show', compact('cars'));
    }
}
