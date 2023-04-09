<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Welfare;


class WelfaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //

        $groups_welfares = [
            [
                'id' => 1001,
                'status' => 0,
                'create_date' => 09/04/2566,
                'creator_id' => "64160284",
                'total_price' => 10000.00,
                'welfare_budget' => 5000.00,
                'welfare_name' => "กินข้าว",
                'user_id' => 64160282,
                'welfare_id' => 9
            ],
            [
                'id' => 1001,
                'status' => 0,
                'create_date' => 09/04/2566,
                'creator_id' => "64160284",
                'total_price' => 10000.00,
                'welfare_budget' => 5000.00,
                'welfare_name' => "กินข้าว",
                'user_id' => 64160167,
                'welfare_id' => 8
            ],
            [
                'id' => 1001,
                'status' => 0,
                'create_date' => 09/04/2566,
                'creator_id' => "64160284",
                'total_price' => 10000.00,
                'welfare_budget' => 5000.00,
                'welfare_name' => "กินข้าว",
                'user_id' => 64160282,
                'welfare_id' => 10
            ]
        ];

        foreach($groups_welfares as $groups_welfare)
        {
            DB::table('groups_welfares')->insert($groups_welfare);
        }
    }
}
