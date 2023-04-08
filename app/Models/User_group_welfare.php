<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_group_welfare extends Model
{
    use HasFactory;
    
    protected $table = 'users_groups_welfares';
    public $timestamps = false;
}
