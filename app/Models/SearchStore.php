<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\LikeCoffee;
use App\Models\CoffeePost;
// use Illuminate\Database\Eloquent\SoftDeletes;

class SearchStore extends Model
{
    use HasFactory;
    // use SoftDeletes;
    
    protected $table = 'searchstores';
    
    protected $fillable=[
      'user_id',
      'bitter',
      'acidity',
      'rich',
      'sweet',
      'smell',
      'created_at',
    ];
    
    //ぺジネーションについての関数
    public function getHistryPaginateBylimit($user_id, int $limit_count = 10) {
        return $this::with('user')->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
