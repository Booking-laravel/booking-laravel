<?php

namespace App\Http\Controllers;

use App\Car;
use App\Company;
use App\Renter;
use App\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenterController extends Controller
{
    //
    public function index (){

        $user_id = Auth::id();
        $user = Renter::find($user_id);
        if($user){
            $allCars = Car::all();
//            return $allCars;
            return view('renters.index',compact('allCars'));
        }
        else
            return "Please Login as Renter!";

    }

    public function booking ($car_id){
//        dd($request);
        $user_id = Auth::id();
        $user = Renter::find($user_id);

//        return $car;
        if($user){
            $car = Car::find($car_id);
            return view('renters.book', compact('car'));
        }
        else
            return "Please Login as Renter!";

    }

    public function bookingDetails (Request $request){
//        dd($request);
        $user_id = Auth::id();
        $user = Renter::find($user_id);
//        $car = Car::find($car_id);
//        return $car;
        if($user){
            Reservation::create([
                'booking_start_at' => $request->input('from'),
                'booking_end_at' => $request->input('to'),
                'car_id' => $request->input('car_id'),
                'renter_id' => $user_id,
            ]);
            return view('renters.completeRes') ;
//            return view('renters.book', compact('car'));
        }
        else
            return "Please Login as Renter!";

    }

    public function profile (){

        $user_id = Auth::id();
//        return $user_id;
        $user = Renter::find($user_id);
        if($user) {
            $allRequests = Reservation::where('renter_id', $user_id)->with('car')->get();
//            dd($allRequests);
//            return $allRequests;
//            return $allCars;
            return view('renters.profile',compact('allRequests'));
        }
        else
            return "Please Login as Renter!";
    }


    public function detail ($car_id){
//        dd($request);
        $user_id = Auth::id();
        $user = Renter::find($user_id);
//        return $car;
        if($user){
            $car = Car::find($car_id);
            $res = Car::with('reservations')->where('id',$car_id)->get();
//            return($res[0]->reservations);
            return view('renters.carDetail', compact('car','res'));
        }
        else
            return "Please Login as Renter!";

    }


}
