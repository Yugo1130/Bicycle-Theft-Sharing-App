<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenBicycle;
use Cloudinary;

class StolenBicycleController extends Controller
{
    public function root(StolenBicycle $slnBike)
    {
        return redirect('/stolenbicycles');
    }

    public function index(StolenBicycle $slnbike)
    {
        // return $slnbike->get();
        return view('stolen_bicycles.index')->with(['slnbikes' => $slnbike->getPaginateByLimit()]);
    }

    public function show(StolenBicycle $slnbike)
    {
        return view('stolen_bicycles.show')->with(['slnbike' => $slnbike]);
    }

    public function create(StolenBicycle $slnbike)
    {
        return view('stolen_bicycles.create');
    }

    public function store(Request $request, StolenBicycle $slnbike)
    {
        // $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image_path = "/a/b/c/d"; //後で実装
        $slnbike->image_path = $image_path;
        // dd($image_path);
        $slnbike->user_id = 2; //仮
        // $user_id = auth()->id();
        $input = $request['stolenbicycle'];
        $slnbike->fill($input)->save();
        return redirect('/stolenbicycles/' . $slnbike->id);
    }
}
