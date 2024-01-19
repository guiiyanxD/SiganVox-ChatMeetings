<?php

namespace App\Http\Controllers;

use App\Models\UserMeet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipationTypeController extends Controller
{
    public function isHost($meet): bool
    {
        $query = UserMeet::where([['meet_id', $meet->id],['user_id', Auth::user()->id]])->first();
        return $query != null && $query->participation_type_id == 1;

    }

    public function isGuest($meet): bool
    {
        $query = UserMeet::where([['meet_id', $meet->id],['user_id', Auth::user()->id]])->first();
        return $query != null && $query->participation_type_id == 2;
    }

    public function addUserEntries($meet){
        $query = UserMeet::where([['meet_id', $meet->id],['user_id', Auth::user()->id]])->first();
        $query->entries_qty++ ;
        $query->save();
//        return dd($query);

    }
}
