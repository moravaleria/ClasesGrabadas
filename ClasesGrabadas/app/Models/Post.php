<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }


}
