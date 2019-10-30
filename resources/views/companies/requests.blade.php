@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($allRequests as $request)
            @if($request->is_booking === 0)
{{--            <div style="border: 1px solid black; margin-bottom: 20px">--}}
{{--                <h1>{{$request->car->carName}}</h1>--}}
{{--                <h2>{{$request->car->brand}}</h2>--}}
{{--                <h3>{{$request->car->model}}</h3>--}}
{{--                <h4>{{$request->booking_start_at}}</h4>--}}
{{--                <h4>{{$request->booking_end_at}}</h4>--}}
{{--                <div>--}}
                <img width="20" height="200" name="img" src="{{asset('storage').'/'.$request->car->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Company Name:</h5>
                    <p class="card-text"> {{$request->car->owner_id}} {{--{{ posts->companyName }}--}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" >Brand: {{$request->car->brand}}</li>
                    <li class="list-group-item">name: {{$request->car->carName}}</li>
                    <li class="list-group-item" >Model: {{$request->car->model}}</li>
                    <h4>{{$request->booking_start_at}}</h4>
                    <h4>{{$request->booking_end_at}}</h4>

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
