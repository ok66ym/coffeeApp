<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeCoffee extends Model
{
    use HasFactory;
    
    protected $table = 'coffee_user';
    
    protected $fillable=[
      'user_id',
      'coffee_id',
    ];
    
    public function coffee() {
        return $this->belongsTo(Coffee::class);
    }

    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
