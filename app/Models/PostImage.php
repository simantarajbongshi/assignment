<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $table = 'posts_images';

    public function post() {
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }
}
