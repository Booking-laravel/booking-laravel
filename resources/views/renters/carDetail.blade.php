@extends('layouts.app')

@section('content')
    <div class="container">
            <div style="border: 1px solid black; margin-bottom: 20px">
                <h1>{{$car->brand}}</h1>
                <h2>{{$car->model}}</h2>
                <h3>{{$car->carName}}</h3>
                <h4>{{$car->status}}</h4>
                <p>{{$car->id}}</p>
{{--                <p>{{$res[0]->reservations->booking_start_at}}</p>--}}

                <ul>
                    @foreach($res[0]->reservations as $r)
                        @if($r->is_booking)
                       <li> Booked from: {{$r->booking_start_at}} <br/>
                           to: {{$r->booking_end_at}} </li>
                        @endif
                    @endforeach
                </ul>
                <div>
                    <form action="{{route('booking', $car->id)}}" method="get">
                        <input type="submit" name="book" value="Book!">
                    </form>
                </div>
            </div>
    </div>
@endsection
