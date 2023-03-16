<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function users_request()
    {
        return $this->belongsToMany(User::class, 'user_welfare', 'welfare_id', 'user_id');
    }
}
