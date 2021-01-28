@extends('cars/layout')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">All logged cars:</h1>
        <a href="{{route('car.index')}}" class="text-gray-400">
            <span class="fas fa-arrow-left cursor-pointer ml-3 fa-2x"></span>
        </a>
    </div>
    <ul class="mt-5">

        @php
            // Creates an array of all cars' license plates, then removes duplicates
            $allPlates = array(count($cars));
            foreach($cars as $key => $car){
                $allPlates[$key] = $car->license_plate;
            }
            $uniquePlates = array_unique($allPlates);
            $emptyCheck = true;
        @endphp
        <x-alert />
        @forelse($uniquePlates as $plate)
            @if(!empty($uniquePlates[0]))
            @php
                $emptyCheck = false;
            @endphp
            <li class="justify-center p-2">
                <div>
                    <a href="{{'car_log/' . $plate}}">Car: <b>{{$plate}}</b></a>
                </div>
            </li>
            @endif
        @empty
        @endforelse
        @if($emptyCheck)
            <h1>No cars!</h1>
        @endif
    </ul>
@endsection
