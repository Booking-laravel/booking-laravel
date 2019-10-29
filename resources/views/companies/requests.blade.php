@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($allRequests as $request)
            @if($request->is_booking === 0)
            <div style="border: 1px solid black; margin-bottom: 20px">
                <h1>{{$request->car->carName}}</h1>
                <h2>{{$request->car->brand}}</h2>
                <h3>{{$request->car->model}}</h3>
                <h4>{{$request->booking_start_at}}</h4>
                <h4>{{$request->booking_end_at}}</h4>
                <div>
                    <form method="post" action="{{route('company.accept.request')}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="req_id" value="{{$request->id}}">
                        <input type="submit" name="check" value="Approve!">
                    </form>
                </div>
            </div>
            @endif
        @endforeach
    </div>

@endsection
