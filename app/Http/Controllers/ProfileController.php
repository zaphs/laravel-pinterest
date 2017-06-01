<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use App\Follow;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function profile(Request $request, User $user)
    {
        return view('user.profile', ['user'=>$user]);
    }
}
