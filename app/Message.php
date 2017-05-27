<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'shoutbox_message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'entity_id', 'username', 'color',
    ];

    /**
     * Get the user that owns the message
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
