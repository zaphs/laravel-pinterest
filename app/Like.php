<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * Get the user that owns the like
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
