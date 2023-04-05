<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_request extends Model
{
    use HasFactory;
    protected $table = 'groups_welfares';
    
    public function get_welfare()
    {
        return $this->belongsTo(Welfare::class, 'welfare_id');
    }

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
