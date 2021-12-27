<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphMany, MorphTo};

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'tweet_id',
        'comment',
        'photo',
    ];

    use HasFactory;

    public function tweet()
    {
        return $this->belongsTo(Tweet::class)->orderBy('id', 'desc');
    }
    
    /**
     * Get the user that owns the Comment
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
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }

    /**
     * Get all of the model that owns content
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('id', 'desc');
    }
}
