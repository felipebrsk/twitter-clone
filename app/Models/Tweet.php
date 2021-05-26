<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'photo',
        'category_id',
        'user_id',
    ];

    use HasFactory;

    public static function getAllTweets()
    {
        return Tweet::orderBy('id', 'desc')->get();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesComments()
    {
        return $this->hasMany(LikeComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function follows()
    {
        return $this->belongsToMany(Follow::class);
    }
}
