<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'user_id',
        'comment_id',
        'reply',
    ];

    use HasFactory;

    public function comment()
    {
        return $this->belongsTo(Comment::class)->orderBy('id', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeReply::class);
    }
}
