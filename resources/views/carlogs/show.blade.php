@extends('cars/layout')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl"><b>{{basename(Request::url())}}</b></h1>
        <a href="{{route('car_log.index')}}" class="text-gray-400">
            <span class="fas fa-arrow-left cursor-pointer ml-3 fa-2x"></span>
        </a>
    </div>
    <div class="mt-5 justify-between">
        @php
            $total = 0;
            $exitCheck = false;
        @endphp
        @forelse($cars as $car)
            @if($car -> license_plate == basename(Request::url()) && $car -> exited)
                @php
                    $exitCheck = true;
                @endphp
                <p>Entry mass: <b>{{$car->entry_mass}} kg</b></p>
                <p>Exit mass: <b>{{$car->exit_mass}} kg</b></p>
                <p>Drop-off mass: <b>{{($car->entry_mass) - ($car->exit_mass)}} kg</b></p>
                <br>
                @php
                    $total += ($car->entry_mass) - ($car->exit_mass);
                @endphp
            @endif
        @empty
            <p>No deliveries!</p>
        @endforelse
        @if($exitCheck)
            <h1>Total drop-off mass: <b>{{$total}} kg</b></h1>
        @else
            <p>No deliveries!</p>
        @endif

    </div>
@endsection
