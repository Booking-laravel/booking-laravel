@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($allCars as $car)
        <div style="border: 1px solid black; margin-bottom: 20px">
            <h1>{{$car->brand}}</h1>
            <h2>{{$car->model}}</h2>
            <h3>{{$car->carName}}</h3>
            <h4>{{$car->status}}</h4>
        </div>
    @endforeach
    </div>
@endsection
