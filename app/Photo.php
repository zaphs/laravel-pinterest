<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    /**
     * Get url for the photo
     *
     * @return string
     */
    public function url()
    {
        //TODO read about files
        return "";
    }

    /**
     * Get all of the comments for the photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the comments for the photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get all of the likes for the photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the user that owns the message
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
