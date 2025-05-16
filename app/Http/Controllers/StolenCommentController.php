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
        return redirect()->route('sln.show', $slnbike);
    }

    public function delete(StolenComment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, '権限がありません');
        }
        $slnbike_id = $comment->stolen_bicycle_id;
        $comment->delete();
        return redirect()->route('sln.show', $slnbike);
    }
}
