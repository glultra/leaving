<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'post_id',
        'user_id',
        'body',
        'image',
        'created_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class)->latest();
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
