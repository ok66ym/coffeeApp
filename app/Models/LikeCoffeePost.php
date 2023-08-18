<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class LikeCoffeePost extends Model
{
    use HasFactory;
    
    protected $table = 'coffeepost_user';
    
    protected $fillable=[
      'user_id',
      'coffeepost_id',
    ];
    
    public function getOwnLikedCoffeePostsPaginateByLimit($user_id, int $limit_count = 9){
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function coffeepost() {
        return $this->belongsTo(CoffeePost::class);
    }

    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
