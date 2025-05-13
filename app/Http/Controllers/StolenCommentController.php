<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenBicycle;
use App\Models\StolenComment;

class StolenCommentController extends Controller
{
    public function store(Request $request, StolenBicycle $slnbike)
    {
        $comment = new StolenComment();
        $comment->stolen_bicycle_id = $slnbike->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect('/stolenbicycles/' . $slnbike->id);
    }

    public function delete(StolenComment $comment)
    {
        // 必要であれば認可チェックなどを追加
        // if (auth()->id() !== $comment->user_id) { abort(403); }

        $slnbike_id = $comment->stolen_bicycle_id;
        $comment->delete();
        return redirect('/stolenbicycles/' . $slnbike_id);
    }
}
