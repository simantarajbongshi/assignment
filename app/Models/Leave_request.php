<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave_request extends Model
{
    use HasFactory;

    protected $table = 'leave_request';
    // protected $casts = [
    //     'leave_start_date' => 'datetime',
    //     'leave_end_date' => 'datetime'
    //  ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function users() {
        return $this->belongsTo('App\Models\User', 'authorized_by', 'id');
    }
}
