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
    ];
    
    
    public function getPaginateBylimit($user_id, int $limit_count = 10) {
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
