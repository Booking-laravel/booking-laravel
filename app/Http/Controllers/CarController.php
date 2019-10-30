<?php

namespace App\Http\Controllers;

use App\Car;
use App\Reservation;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Car::all();

//        dd($cards);
       $cards = Car::with('company')->get();
//         dd($allCards);
//        return $allCards;
        return view('posts.card', compact('cards'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner_id = Auth::id();

        $car = Car::create([
            'img' => request()->img->store('uploads', 'public'),
            'brand' => $request->input('brand'),
            'carName' => $request->input('carName'),
            'model' => $request->input('model'),
            'owner_id' => $owner_id
        ]);
//       $this->fileUpload($car);
//        $this->storeImage($car);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $posts = Reservation::findOrFail($id);
//        dd($id);
//        $d = strtotime($request->input('startingDate'));
//        $posts->update([
//            'booking_start_at' => $request->input('startingDate'),
//            'booking_end_at' => $request->input('endingDate')
//        ]);
//        return redirect()->route('posts.index');
    }


public function sort(Request $request){
    $brand = $request->input('brand');
    if($request->input($brand) !== 'All Cars'){
           $sortBy = $request->input($brand);
           $cards = Car::where('carName', $sortBy)->get();
    }elseif ($request->input('brand') !== 'All Brands'){
        $sortBy = $request->input('brand');
        $cards = Car::where('brand', $sortBy)->get();
    }
    if($request->input('model') !== 'All Model'){
        $sortBy = $request->input('model');
        $cards = Car::where('model', $sortBy)->get();
    }
       return view('posts.card',compact('cards'));
   }

    public function destroy($id)
    {

//        $tasks=Car::where ('id',$id)->delete();
//        $tasks=$this->destroy($id);
        Car::destroy($id);
        return redirect()->route('posts.index');
//        return $id;
    }


}
