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
        return redirect()->route('abd.show', $abdbike);

    }

    public function delete(AbandonedComment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, '権限がありません');
        }
        $abdbike_id = $comment->abandoned_bicycle_id;
        $comment->delete();
        return redirect()->route('abd.show', $abdbike);

    }
}
