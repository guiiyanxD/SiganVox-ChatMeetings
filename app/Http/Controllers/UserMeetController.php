<?php

namespace App\Http\Controllers;

use App\Models\UserMeet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMeetController extends Controller
{
    public function getMeetsByUser(){
        $user = Auth::user();
        $meets = UserMeet::where('user_id', $user->id)->distinct()->get();
        return $meets;
    }
}
