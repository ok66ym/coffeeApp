<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class LikeCoffee extends Model
{
    use HasFactory;
    
    protected $table = 'coffee_user';
    
    protected $fillable=[
      'user_id',
      'coffee_id',
    ];
    
    public function getOwnLikedCoffeesPaginateByLimit($user_id, int $limit_count = 9){
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function coffee() {
        return $this->belongsTo(Coffee::class);
    }

    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
