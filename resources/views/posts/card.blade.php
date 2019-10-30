{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Post</title>--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--</head>--}}
{{--<body>--}}
@extends('layouts.app')

@section('content')


<form action="{{ route('sort') }}" method="GET">
    <div class="w-25">
        <select onchange="changeCarsTypes()" id="brand" name="brand" class="form-control" focus>
            <option selected>All Brands</option>
            <option id="ford" name="Ford" > Ford </option>
            <option name="Toyota" > Toyota </option>
            <option name="Mercides" > Mercides </option>
            <option name="BMW" > BMW </option>
        </select>
        <div id="Toyota" class="carName" style="display: none">
            <select id="carName" name="Toyota" class="form-control" focus>
                <option >All Cars</option>
                <?php
                $Toyota = ['Camry', 'Corrola', 'Prious', 'LandCrouser'];
                ?>
                @foreach( $Toyota as $types)
                    <option value="{{$types}}"> {{$types}} </option>
                @endforeach
            </select>
        </div>
        <div id="Ford" class="carName" style="display: none">
            <select id="carName" name="Ford" class="form-control" focus>
                <option >All Cars</option>
                <?php
                $Ford = ['Fusion', 'Fusion', 'Fusion', 'Fusion'];
                ?>
                @foreach( $Ford as $types)
                    <option value="{{$types}}"> {{$types}} </option>
                @endforeach
            </select>
        </div>
        <div id="BMW" class="carName" style="display: none">
            <select id="carName" name="BMW" class="form-control" focus>
                <option >All Cars</option>
                <?php
                $BMW = ['BMW', 'BMW', 'BMW', 'BMW'];
                ?>
                @foreach( $BMW as $types)
                    <option value="{{$types}}"> {{$types}} </option>
                @endforeach
            </select>
        </div>
        <div id="Mercides" class="carName" style="display: none">
            <select id="carName" name="Mercides" class="form-control" focus>
                <option >All Cars</option>
                <?php
                $Mercides = ['Mercides', 'Mercides', 'Mercides', 'Mercides']
                ?>
                @foreach( $Mercides as $types)
                    <option value="{{$types}}"> {{$types}} </option>
                @endforeach
            </select>
        </div>
        <select id="model" name="model" class="form-control" focus>
            <option selected>All Model</option>
            <option> 2009 </option>
            <option> 2010 </option>
            <option> 2011 </option>
            <option> 2012 </option>
            <option> 2013 </option>
            <option> 2014 </option>
            <option> 2015 </option>
            <option> 2016 </option>
            <option> 2017 </option>
            <option> 2018 </option>
            <option> 2019 </option>
        </select>
    </div>
    <button name="submit" class="btn btn-info">Submit</button>
</form>
@foreach($cards as $card)
    {{--        {{Storage::url('8SGvjRu1oRUilJbaudneW5W4jrr37jUgvKB7ZhbJ.jpeg')}}--}}
    <form action="{{route('detail',$card->id)}}" method="GET">
{{--        @method('PUT')--}}
        @csrf
        <div class="card" style="width: 18rem;">

            <img name="img" src="{{asset('storage').'/'.$card->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Company Name:</h5>
                <p class="card-text"> {{$card->owner_id}} {{--{{ posts->companyName }}--}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" value="{{$card->brand}}">Brand: {{$card->brand}}</li>
                <li class="list-group-item">name: {{$card->carName}}</li>
                <li class="list-group-item" value="{{$card->model}}">Model: {{$card->model}}</li>



            </ul>
            <div class="card-body">
                {{--        <a href="#" class="card-link">Card link</a>--}}

{{--                <button name="submit" class="btn btn-info">Booking</button>--}}

{{--                <form action="{{route('detail', $card->id)}}" method="get">--}}
                    <input type="submit" name="detail" value="Detail!">
{{--                </form>--}}

            </div>
        </div>
    </form>
@endforeach
<script>
    function changeCarsTypes() {
        let sellected = document.getElementById('brand').value
        for (let i = 0; i <= 3; i++) {

            if(document.getElementsByClassName('carName')[i].id === sellected){
                document.getElementById(sellected).style.display = "block"
            }
            else{
                document.getElementsByClassName('carName')[i].style.display = "none"
            }
        }
    }
</script>

@endsection
{{--</body>--}}
{{--</html>--}}
