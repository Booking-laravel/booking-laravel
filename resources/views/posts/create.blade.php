@extends('layouts.app')
@section('content')
    <form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data" >

        @csrf

        <div class="form-group" >
            <label for="exampleInputEmail1">Brand</label>
            <input  name ="brand" type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="form-group" >
            <label for="exampleInputEmail1">Car Name</label>
            <input  name ="carName" type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="form-group" >
            <label for="exampleInputEmail1">Model</label>
            <input  name ="model" type="text" class="form-control" id="exampleInputEmail1" >
        </div>
{{--        <div class="form-group" >--}}
{{--            <label for="exampleInputEmail1">price</label>--}}
{{--            <input  name ="carName" type="text" class="form-control" id="exampleInputEmail1" >--}}
{{--        </div>--}}
        <div class="form-group" >
            <label for="exampleInputEmail1">img</label>
            <input  name ="img" type="file" class="form-control" id="exampleInputEmail1"  placeholder="uplode img">
        </div>
        {{--        <div class="form-group row">--}}
        {{--            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>--}}
        {{--            <div class="col-md-6">--}}
        {{--                <input id="profile_image" type="file" class="form-control" name="profile_image">--}}
        {{--               --}}
        {{--            </div>--}}



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
