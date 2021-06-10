<?php

namespace App\Models;

use App\Traits\HasPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, HasPassword, Authorizable, Authenticatable;

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
        'views',
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
        return $this->hasMany(Tweet::class)->orderBy('is_fixed', 'desc')->orderBy('id', 'desc');
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

    public function follows()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function followsReq()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }
}
