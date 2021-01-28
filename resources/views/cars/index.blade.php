@extends('cars/layout2')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">All active cars:</h1>
        <a href="{{route('car.create')}}" class="text-blue-400">
            <span class="fas fa-plus-circle cursor-pointer ml-3 fa-2x"/>
        </a>
    </div>
    <ul class="mt-5">
        <x-alert />
        @php
            $check = true;
        @endphp
        @forelse($cars as $car)
            @if(!$car->exited)
            @php
                $check = false;
            @endphp
            <li class="flex justify-between p-2">
                <div>
                    <p class="cursor-pointer">Car {{$car->id}}. <b>{{$car->license_plate}}</b> ({{$car->entry_mass}}kg)</p>
                </div>
                <!-- RIGHT -->
                <div>
                    <a href="{{route('car.edit', $car->id)}}" class="text-yellow-400">
                        <span class="fas fa-edit fa-lg"/>
                    </a>

                    <span onclick="event.preventDefault();
                        if(confirm('Do you really want to delete this car?')){
                        document.getElementById('form-delete-{{$car->id}}').submit()}" class="fas fa-trash text-red-500 fa-lg px-2 cursor-pointer"></span>
                    <form style="display:none" id="{{'form-delete-'.$car->id}}" method="post" action="{{route('car.destroy', $car->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </li>
            @endif
        @empty
        @endforelse
        @if($check)
            <h2>No cars!</h2>
        @endif
    </ul>
@endsection
