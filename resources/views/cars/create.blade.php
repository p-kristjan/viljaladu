@extends('cars/layout')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">Enter a new car:</h1>
        <a href="{{route('car.index')}}" class="text-gray-400">
            <span class="fas fa-arrow-left cursor-pointer ml-3 fa-2x"></span>
        </a>
    </div>
    <form method="post" action="{{route('car.store')}}" class="pt-5 pb-2">
        <x-alert />
        @csrf
        <div class="mb-2">
            <input type="text" name="license_plate" class="p-2 border rounded-lg" placeholder="License plate">
        </div>

        <div class="mb-2">
            <input type="number" name="entry_mass" class="p-2 border rounded-lg" placeholder="Entry mass (kg)">
        </div>

        <div>
            <input type="submit" value="Create" class="p-2 border rounded-lg">
        </div>
    </form>
@endsection
