<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenBicycle;
use App\Models\AbandonedBicycle;
use App\Models\StolenComment;
use App\Models\AbandonedComment;
use App\Http\Requests\MypageRequest;

class MypageController extends Controller
{
    public function show(StolenBicycle $slnbike, AbandonedBicycle $abdbike, StolenComment $slncomment, AbandonedComment $abdcomment)
    {
        $userId = auth()->id();
        $slnbikes = $slnbike->getUserPost($userId);
        $abdbikes = $abdbike->getUserPost($userId);
        $slncomments = $slncomment->getUserComments($userId);
        $abdcomments = $abdcomment->getUserComments($userId);
        return view('mypage.index')->with(['slnbikes' => $slnbikes, 'abdbikes' => $abdbikes, 'slncomments' => $slncomments, 'abdcomments' => $abdcomments]);
    }
}
