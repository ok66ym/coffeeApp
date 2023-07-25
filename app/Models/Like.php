<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $table = 'coffeepost_user';
    
    protected $fillable=[
      'user_id',
      'coffeepost_id',
    ];
    
    public function coffeepost() {
        return $this->belongsTo(CoffeePost::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
