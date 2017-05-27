<?php

namespace App\Repositories;

use App\User;
use App\Message;

class MessageRepository
{
    /**
     * Get all of the messages for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Message::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

