<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenBicycle;
use App\Http\Requests\StolenBicycleRequest;
use Cloudinary;

class StolenBicycleController extends Controller
{
    public function root()
    {
        return redirect('/stolenbicycles');
    }

    public function index(Request $request, StolenBicycle $slnbike)
    {
        $hasFilter = $request->filled('model') || $request->filled('manufacturer') ||
            $request->filled('frame_num') || $request->filled('bouhan_num');

        $models = config("bicycle.models");

        if ($hasFilter) {
            $slnbikes = $slnbike->getFiltered($request->only([
                'model',
                'manufacturer',
                'frame_num',
                'bouhan_num'
            ]));
        } else {
            $slnbikes = $slnbike->getPaginateByLimit();
        }

        return view('stolen_bicycles.index')->with(['slnbikes' => $slnbikes, 'models' => $models]);
    }

    public function show(StolenBicycle $slnbike)
    {
        $comments = $slnbike->stolencomments()->latest()->get();
        return view('stolen_bicycles.show')->with(['slnbike' => $slnbike, 'comments' => $comments]);
    }

    public function create()
    {
        $models = config("bicycle.models");
        $manufacturers = collect(config("bicycle.manufacturers"))->sortKeys();
        $prefectures = config("bicycle.prefectures");
        return view('stolen_bicycles.create')->with(['models' => $models, 'manufacturers' => $manufacturers, 'prefectures' => $prefectures,]);
    }

    public function store(StolenBicycleRequest $request)
    {
        $slnbike = new StolenBicycle();
        if ($request->hasFile('image')) {
            $slnbike->image_path = Cloudinary::upload($request->file('image')->getRealPath(), ['public_id' => 'slnbike_' . $slnbike->id, 'overwrite' => true])->getSecurePath();
        }
        $slnbike->user_id = auth()->id();
        $input = $request['stolenbicycle'];
        $slnbike->fill($input)->save();
        return redirect()->route('sln.show', $slnbike);
    }

    public function delete(StolenBicycle $slnbike)
    {
        if (auth()->id() !== $slnbike->user_id) {
            abort(403, '権限がありません');
        }
        $slnbike->delete();
        return redirect()->route('sln.index');
    }

    public function edit(StolenBicycle $slnbike)
    {
        if (auth()->id() !== $slnbike->user_id) {
            abort(403, '権限がありません');
        }
        $models = config("bicycle.models");
        $manufacturers = collect(config("bicycle.manufacturers"))->sortKeys();
        $prefectures = config("bicycle.prefectures");
        return view('stolen_bicycles.edit')->with(['slnbike' => $slnbike, 'models' => $models, 'manufacturers' => $manufacturers, 'prefectures' => $prefectures,]);
    }

    public function update(StolenBicycleRequest $request, StolenBicycle $slnbike)
    {
        if (auth()->id() !== $slnbike->user_id) {
            abort(403, '権限がありません');
        }
        if ($request->hasFile('image')) {
            $slnbike->image_path = Cloudinary::upload($request->file('image')->getRealPath(), ['public_id' => 'slnbike_' . $slnbike->id, 'overwrite' => true])->getSecurePath();
        }
        $slnbike->user_id = auth()->id();
        $input = $request['stolenbicycle'];
        $slnbike->fill($input)->save();
        return redirect()->route('sln.show', $slnbike);
    }
}
