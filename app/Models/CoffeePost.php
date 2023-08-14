<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoffeePost extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'coffeeposts';
    
    protected $fillable=[
      'user_id',
      'name',
      'species_name',
      'area_name',
      'shop_name',
      'shop_url',
      'bitter',
      'acidity',
      'rich',
      'sweet',
      'smell',
      'roasted',
      'explanation',
      'image'
    ];
    
    //ぺジネーションについての関数
    public function getPaginateBylimit($user_id, int $limit_count = 10) {
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //usersテーブルとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //coffeepost_userテーブルとのリレーション
    // public function likes() {
    //     return $this->hasMany(Like::class);
    // }
   public function likes()
    {
        return $this->belongsToMany(User::class, 'coffeepost_user', 'coffeepost_id', 'user_id');
    }

}
