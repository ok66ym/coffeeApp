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
        'myinfo',
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
    public function getOwnPaginateByLimit(int $limit_count = 9){
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //coffeepostsテーブルとのリレーション
    public function posts(){
        return $this->hasMany(CoffeePost::class);
    }
    
    // CoffeePostsへのいいね
    public function likesCoffeePosts()
    {
        return $this->belongsToMany(CoffeePost::class, 'coffeepost_user', 'user_id', 'coffeepost_id');
    }

    // Coffeesへのいいね
    public function likesCoffees()
    {
        return $this->belongsToMany(Coffee::class, 'coffee_user', 'user_id', 'coffee_id');
    }
    
    public function searchStores() {
        return $this->hasMany(SearchStore::class);
    }


}
