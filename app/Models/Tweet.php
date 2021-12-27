<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Collection, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany, MorphMany};

class Tweet extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'photo',
        'is_fixed',
        'views',
        'category_id',
        'user_id',
    ];

    use HasFactory;

    /**
     * Get all tweets.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllTweets(): Collection
    {
        return Tweet::orderBy('id', 'desc')->get();
    }

    /**
     * Get all of the likes for the Like
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }
    
    /**
     * Get the user that owns the Tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the likes for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * The follows that belong to the Tweet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(Follow::class);
    }
}
