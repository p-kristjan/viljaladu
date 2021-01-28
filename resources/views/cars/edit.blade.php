@extends('cars/layout')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">Edit a car:</h1>
        <a href="{{route('car.index')}}" class="text-gray-400">
            <span class="fas fa-arrow-left cursor-pointer ml-3 fa-2x"/>
        </a>
    </div>
    <form method="post" action="{{route('car.update', $car->id)}}" class="pt-5 pb-2">
        <x-alert />
        @csrf
        @method('patch')
        @csrf
        <div class="mb-2">
            <input type="number" name="exit_mass" class="p-2 border rounded-lg" placeholder="Exit mass (kg)">
        </div>

        <div>
            <input type="submit" value="Update" class="p-2 border rounded-lg">
        </div>
    </form>
@endsection
