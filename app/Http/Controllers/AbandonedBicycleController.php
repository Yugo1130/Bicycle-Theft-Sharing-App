<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbandonedBicycle;
use Cloudinary;

class AbandonedBicycleController extends Controller
{
    public function index(AbandonedBicycle $abdbike)
    {
        // return $abdbike->get();
        return view('abandoned_bicycles.index')->with(['abdbikes' => $abdbike->getPaginateByLimit()]);
    }

    public function show(AbandonedBicycle $abdbike)
    {
        return view('abandoned_bicycles.show')->with(['abdbike' => $abdbike]);
    }

    public function create(AbandonedBicycle $abdbike)
    {
        return view('abandoned_bicycles.create');
    }

    public function store(Request $request, AbandonedBicycle $abdbike)
    {
        // dd($request->input('abandonedbicycle'))
        // $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image_path = "/a/b/c/d"; //後で実装
        $abdbike->image_path = $image_path;
        // dd($image_path);
        $abdbike->user_id = 2; //仮
        // $user_id = auth()->id();
        $input = $request['abandonedbicycle'];
        $abdbike->fill($input)->save();
        return redirect('/abandonedbicycles/' . $abdbike->id);
    }
}
