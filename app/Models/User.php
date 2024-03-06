<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\SendVerifyQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
    
    public static function getRoles (){
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_READER => 'Reader',
        ];
    }
    public function isAdmin(){
        return $this->role === self::ROLE_ADMIN;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyQueueNotification());
    }

    public function likedPosts(){
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'user_id');
    }
}
