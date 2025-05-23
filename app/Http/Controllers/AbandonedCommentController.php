<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbandonedBicycle;
use App\Models\AbandonedComment;
use App\Mail\AbandonedCommentNotificationMail;
use Illuminate\Support\Facades\Mail;

class AbandonedCommentController extends Controller
{
    public function store(Request $request, AbandonedBicycle $abdbike)
    {
        $comment = new AbandonedComment();
        $comment->abandoned_bicycle_id = $abdbike->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        // 投稿主にメールが届く
        if ($abdbike->user_id !== auth()->id()) {
            Mail::to($abdbike->user->email)->send(new AbandonedCommentNotificationMail($comment));
        }

        return redirect()->route('abd.show', $abdbike);
    }

    public function delete(AbandonedComment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, '権限がありません');
        }
        $abdbike_id = $comment->abandoned_bicycle_id;
        $comment->delete();
        return redirect()->route('abd.show', $abdbike_id);

    }
}
