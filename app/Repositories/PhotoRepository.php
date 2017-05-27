<?php

namespace App\Repositories;

use App\Tag;
use App\User;
use App\Photo;

class PhotoRepository
{
    /**
     * Get all of the photos for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Photo::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();
    }


    public function profilePhotos(User $user)
    {
        return Photo::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();
    }
}

