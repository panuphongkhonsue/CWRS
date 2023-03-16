<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $roles = [
            ['name' => 'Developer Manager'],
            ['name' => 'Full-stack Developer'],
            ['name' => 'Human Resource Manager'],
            ['name' => 'Human Resource Officer'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Marketing Assistant'],
            ['name' => 'Accounting Masnager'],
            ['name' => 'Accounting Assistant']
        ];

        foreach($roles as $role)
        {
            DB::table('roles')->insert($role);
        }
    }
}
