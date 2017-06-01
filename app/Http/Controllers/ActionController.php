<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use App\Photo;
use App\User;
use App\Like;


class ActionController extends Controller
{
    public function follow(Request $request, User $user){

        $follow = Follow::firstOrCreate(
            ['follower_id' => $request->user()->id],
            ['user_id' => $user->id]
        );

        return redirect()->route('user.view', $user);
    }

    public function like(Request $request, Photo $photo){

        $like = Like::where([
            ['photo_id', '=', $photo->id],
            ['user_id', '=', $request->user()->id],
        ])->first();

        if (!$like) {

            $like = new Like;
            $like->photo_id = $photo->id;
            $like->user_id = $request->user()->id;

            $photo->likes()->save($like);
        }

        return redirect()->route('photo.view', $photo);
    }
}
