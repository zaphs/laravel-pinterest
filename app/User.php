<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function avatar()
//    {
//
//    }

    /**
     * Get all of the messages for the user.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get all of the photos for the user.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, Photo::class);
    }

}
