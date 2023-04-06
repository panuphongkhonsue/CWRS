<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Single_request extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users_welfares';

    public function get_welfare()
    {
        return $this->belongsTo(Welfare::class, 'welfare_id');
    }

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
