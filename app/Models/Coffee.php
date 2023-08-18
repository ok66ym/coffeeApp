<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;
    
    protected $table = 'coffees';
    
    protected $fillable=[
      'id',
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
      'official_url',
    ];
    
    
    //ぺジネーションについての関数
    public function getPaginateBylimit($user_id, int $limit_count = 9) {
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function likes()
    {
        return $this->belongsToMany(User::class, 'coffee_user', 'coffee_id', 'user_id');
    }
}
