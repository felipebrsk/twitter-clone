<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'bio',
        'location',
        'site',
        'picture',
        'banner',
        'birthdate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->orderBy('id', 'desc');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesComments()
    {
        return $this->hasMany(LikeComment::class);
    }

    public function likesReplies()
    {
        return $this->hasMany(LikeReply::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('id', 'desc');
    }
}
