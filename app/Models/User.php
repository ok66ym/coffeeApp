<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];
    
    //ぺジネーションについての関数
    public function getOwnPaginateByLimit(int $limit_count = 5){
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //coffeepostsテーブルとのリレーション
    public function posts(){
        return $this->hasMany(CoffeePost::class);
    }
    
    //coffeepost_userテーブルとのリレーション
    // public function likes() {
    //     return $this->hasMany(Like::class);
    // }
    
    public function likes()
    {
        return $this->belongsToMany(CoffeePost::class, 'coffeepost_user', 'user_id', 'coffeepost_id');
    }


}
