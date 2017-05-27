<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function profile(Request $request, User $user)
    {
        $photos = Photo::where('user_id')->get();
        return view('user.profile', ['user'=>$user]);
    }
}
