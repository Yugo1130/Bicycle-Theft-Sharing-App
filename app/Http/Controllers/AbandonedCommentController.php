<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbandonedBicycle;
use App\Models\AbandonedComment;

class AbandonedCommentController extends Controller
{
    public function store(Request $request, AbandonedBicycle $abdbike)
    {
        $comment = new AbandonedComment();
        $comment->abandoned_bicycle_id = $abdbike->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect('/abandonedbicycles/' . $abdbike->id);
    }

    public function delete(AbandonedComment $comment)
    {
        // 必要であれば認可チェックなどを追加
        // if (auth()->id() !== $comment->user_id) { abort(403); }

        $abdbike_id = $comment->abandoned_bicycle_id;
        $comment->delete();
        return redirect('/abandonedbicycles/' . $abdbike_id);
    }
}
