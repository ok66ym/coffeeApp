<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\LikeCoffee;
use App\Models\CoffeePost;

class SearchStore extends Model
{
    use HasFactory;
    
    protected $table = 'searchstores';
    
    protected $fillable=[
      'user_id',
      'bitter',
      'acidity',
      'rich',
      'sweet',
      'smell',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
