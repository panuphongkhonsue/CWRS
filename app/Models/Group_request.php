<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
    * Group_request
    * Model ของ การเบิกแบบสันทนาการ
    * @input :
    * @output : ดึงข้อมูลจากตารางของการเบิกแบบสันทนาการ
    * @author : Sarun Reaungthai
    * @Create Date : 2023-04-05
*/
class Group_request extends Model
{
    use HasFactory;
    protected $table = 'groups_welfares';
    public $timestamps = false;

    public function get_welfare()
    {
        return $this->belongsTo(Welfare::class, 'welfare_id');
    }

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
