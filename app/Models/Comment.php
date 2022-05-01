<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    

    protected $table = 'posts_comments';

    public function post() {
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'commented_user_id', 'id');
    }
}
