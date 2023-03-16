<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departments = [
            ['name' => 'Developer'],
            ['name' => 'Human Resource'],
            ['name' => 'Marketing'],
            ['name' => 'Accounting']
        ];

        foreach($departments as $department)
        {
            DB::table('departments')->insert($department);
        }
    }
}
