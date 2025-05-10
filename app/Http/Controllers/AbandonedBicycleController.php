<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbandonedBicycle;
use Cloudinary;

class AbandonedBicycleController extends Controller
{
    // 一覧表示
    public function index(Request $request, AbandonedBicycle $abdbike)
    {
        $hasFilter = $request->filled('model') || $request->filled('manufacturer') ||
                     $request->filled('frame_num') || $request->filled('bouhan_num');

        $models = config("bicycle.models");

        if ($hasFilter) {
            $abdbikes = $abdbike->getFiltered($request->only([
                'model', 'manufacturer', 'frame_num', 'bouhan_num'
            ]));
        } else {
            $abdbikes = $abdbike->getPaginateByLimit();
        }

        return view('abandoned_bicycles.index')->with(['abdbikes' => $abdbikes, 'models' => $models]);
    }

    // 詳細表示
    public function show(AbandonedBicycle $abdbike)
    {
        $comments = $abdbike->abandonedcomments()->latest()->get();
        return view('abandoned_bicycles.show')->with(['abdbike' => $abdbike, 'comments' => $comments]);
    }

    // 投稿作成
    public function create()
    {
        $models = config("bicycle.models");
        $manufacturers = collect(config("bicycle.manufacturers"))->sortKeys();
        $prefectures = config("bicycle.prefectures");
        return view('abandoned_bicycles.create')->with(['models' => $models, 'manufacturers' => $manufacturers, 'prefectures' => $prefectures,]);
    }

    // 投稿登録
    public function store(Request $request)
    {
        $abdbike = new AbandonedBicycle();
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

    // 投稿削除
    public function delete(AbandonedBicycle $abdbike)
    {
        // if (!auth()->check()) {
        //     // 未ログインならログインページへ
        //     return redirect()->route('login'); // または abort(401)
        // }

        // if (auth()->id() !== $abdbike->user_id) {
        //     abort(403, '権限がありません．');
        // }
        $abdbike->delete();
        return redirect('/abandonedbicycles');
    }

    // 投稿編集
    public function edit(AbandonedBicycle $abdbike)
    {
        // if (!auth()->check()) {
        //     // 未ログインならログインページへ
        //     return redirect()->route('login'); // または abort(401)
        // }

        // if (auth()->id() !== $abdbike->user_id) {
        //     abort(403, '権限がありません．');
        // }
        $models = config("bicycle.models");
        $manufacturers = collect(config("bicycle.manufacturers"))->sortKeys();
        $prefectures = config("bicycle.prefectures");
        return view('abandoned_bicycles.edit')->with(['abdbike' => $abdbike, 'models' => $models, 'manufacturers' => $manufacturers, 'prefectures' => $prefectures,]);

    }

    // 編集後投稿登録
    public function update(Request $request, AbandonedBicycle $abdbike)
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
