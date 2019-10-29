@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($allRequests as $request)
            <div style="border: 1px solid black; margin-bottom: 20px">
                <h1>{{$request->car->carName}}</h1>
                <h2>{{$request->car->brand}}</h2>
                <h3>{{$request->car->model}}</h3>
                <h4>{{$request->booking_start_at}}</h4>
                <h4>{{$request->booking_end_at}}</h4>
                @if($request->is_booking === 0)
                    <div>
                        <h4 style="color: red">Not Approved!</h4>
                    </div>
                @else
                    <div>
                        <h4 style="color: green">Approved!</h4>
                    </div>
                @endif
            </div>

        @endforeach
    </div>

@endsection
