<?php

namespace App\Http\Controllers;

use App\Car;
use App\Company;
use App\Reservation;
//use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class CompanyController extends Controller
{
    //
    public function index (){

        $user_id = Auth::id();
        $user = Company::find($user_id);
//        if($user->role === "company");
        if($user) {
            $allCars = Car::all();
//            return $allCars;
            return view('companies.index',compact('allCars'));
        }
            else
            return "Please Login as Company!";
    }

    public function create (){

        $user_id = Auth::id();
        $user = Company::find($user_id);
//        if($user->role === "company");
        if($user)
            return view('companies.create');
        else
            return "Please Login as Company!";
    }
    public function createcar (Request $request){

        $user_id = Auth::id();
        $user = Company::find($user_id);
//        if($user->role === "company");
        if($user) {
//            dd($request);
            Car::create([
                'model' => $request->input('model'),
                'brand' => $request->input('brand'),
                'img' => $request->input('img'),
                'carName' => $request->input('carName'),
                'status' => "available",
                'owner_id' => $user_id,
            ]);

//            return "Created";
            return redirect()->route('homeCompany');

        }
        else
            return "Please Login as Company!";
    }

    public function requests (){

        $user_id = Auth::id();
//        return $user_id;
        $user = Company::find($user_id);
        if($user) {
            $allRequests = Reservation::with('car')->whereHas('car', function (Builder $query) use ($user_id){
                $query->where('owner_id', '=',$user_id);
            })->get();
//            return $allRequests;
//            return $allCars;
            return view('companies.requests',compact('allRequests'));
        }
        else
            return "Please Login as Company!";
    }

    public function acceptrequest (Request $request){
//        dd($request);
        $user_id = Auth::id();
//        return $user_id;
        $user = Company::find($user_id);
        if($user) {
            $req_id= $request->input('req_id');
//            return $request->input('req_id');
            $res = Reservation::find($request->input('req_id'));
            $res->update([
                'is_booking'  => true
            ]);

            return "Reservation Accepted successfully";
            return view('companies.requests',compact('allRequests'));
        }
        else
            return "Please Login as Company!";
    }

    public function profile (){

        $user_id = Auth::id();
//        return $user_id;
        $user = Company::find($user_id);
        if($user) {
            $allRequests = Reservation::with('car')->whereHas('car', function (Builder $query) use ($user_id){
                $query->where('owner_id', '=',$user_id);
            })->get();
//            return $allRequests;
//            return $allCars;
            return view('companies.profile',compact('allRequests'));
        }
        else
            return "Please Login as Company!";
    }



}
