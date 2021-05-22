<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Tweet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeComment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
