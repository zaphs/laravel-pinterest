<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'entity_id',
        'user_id',
    ];

    /**
     * Get the user that owns the like
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

}
