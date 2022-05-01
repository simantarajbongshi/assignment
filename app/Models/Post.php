<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function postimage() {
        return $this->hasMany('App\PostImage', 'post_id', 'post_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'post_id', 'post_id');
    }
}
