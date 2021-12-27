<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphTo};

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'likable_id',
        'likable_type',
    ];

    use HasFactory;

    /**
     * Get the user that owns the Like
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the model that owns content
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likable(): MorphTo
    {
        return $this->morphTo();
    }
}
