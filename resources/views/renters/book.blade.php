@extends('layouts.app')

@section('content')
    <div class="container" style="border: 1px solid black; width: 25%; padding: 25px">
        <div>
            <h1>{{$car->carName}}</h1>
        </div>
        <div>
            <h2>{{$car->brand}}</h2>
        </div>
        <div>
            <h3>{{$car->model}}</h3>
        </div>
        <div>
            <h4>{{$car->status}}</h4>
        </div>
        <div>
            <form action="{{route('booking.details')}}" method="post">
                @csrf
                <div>
                    <label for="from">From:</label>
                    <input type="date" name="from" id="from">
                </div>
                <div>
                    <label for="to">To:</label>
                    <input type="date" name="to" id="to">
                </div>
                <input type="hidden" name="car_id" value="{{$car->id}}">
                <input type="submit" name="book" value="Book Now!">
            </form>
        </div>
    </div>

@endsection
