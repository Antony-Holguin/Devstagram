<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model

{
    protected $fillable= [
        'title',
        'description',
        'image',
        'user_id'
    ];

    use HasFactory;

    //Relaciones
    public function user(){ //The name of the model must be set instead of users table
        return $this->belongsTo(User::class)->select(['username', 'name']);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function checklike(User $user){
       return $this->like->contains('user_id', $user->id);
    }
}
