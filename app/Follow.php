<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = [
        'follower_id',
        'user_id',
    ];

    /**
     * Get the user that owns the like
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
