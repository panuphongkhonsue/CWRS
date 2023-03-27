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

        $welfares = [
            [
                'title' => 'สวัสดิการ 2,000 บาท',
                'type' => 'S',
                'budget' => 2000.00,
                'creator_id' => "64160284"
            ],
            [
                'title' => 'เงินช่วยเหลืองานสมรส',
                'type' => 'S',
                'budget' => 2000.00,
                'creator_id' => "64160284"
            ],
            [
                'title' => 'สวัสดิการช่วยเหลืองานฌาปนกิจ',
                'type' => 'S',
                'budget' => 2000.00,
                'creator_id' => "64160165"
            ],
            [
                'title' => 'สวัสดิการช่วยเหลือค่ารักษาพยาบาล บิดา / มารดา',
                'type' => 'S',
                'budget' => 2000.00,
                'creator_id' => "64160165"
            ],
            [
                'title' => 'สวัสดิการเงินรับขวัญบุตรพนักงาน',
                'type' => 'S',
                'budget' => 2000.00,
                'creator_id' => "64160284"
            ],
            [
                'title' => 'กิจกรรมกินเลี้ยงสังสรรค์ภายในหน่วยงาน',
                'type' => 'G',
                'budget' => 1200.00,
                'creator_id' => "64160284"
            ],
            [
                'title' => 'กิจกรรมท่องเที่ยวภายในหน่วยงาน',
                'type' => 'G',
                'budget' => 2000.00,
                'creator_id' => "64160165"
            ]
        ];

        foreach($welfares as $welfare)
        {
            DB::table('welfares')->insert($welfare);
        }
    }
}
