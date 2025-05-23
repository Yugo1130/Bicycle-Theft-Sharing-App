<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenBicycle;
use App\Models\StolenComment;
use App\Mail\StolenCommentNotificationMail;
use Illuminate\Support\Facades\Mail;

class StolenCommentController extends Controller
{
    public function store(Request $request, StolenBicycle $slnbike)
    {
        $comment = new StolenComment();
        $comment->stolen_bicycle_id = $slnbike->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        // 投稿主にメールが届く
        if ($slnbike->user_id !== auth()->id()) {
            Mail::to($slnbike->user->email)->send(new StolenCommentNotificationMail($comment));
        }

        return redirect()->route('sln.show', $slnbike);
    }

    public function delete(StolenComment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, '権限がありません');
        }
        $slnbike_id = $comment->stolen_bicycle_id;
        $comment->delete();
        return redirect()->route('sln.show', $slnbike_id);
    }
}
