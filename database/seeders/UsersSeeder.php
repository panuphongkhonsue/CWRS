<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users =
        [
            [
                'id' => '64160299',
                'type' => 'M',
                'fname' => 'Rawich',
                'lname' => "Piboonsin",
                'email' => '64160299@go.buu.ac.th',
                'department_id' => 1,
                'role_id' => 1,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160282',
                'type' => 'E',
                'fname' => 'Phanupong',
                'lname' => 'Khonsue',
                'email' => '64160282@go.buu.ac.th',
                'department_id' => 1,
                'role_id' => 2,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160284',
                'type' => 'H',
                'fname' => 'Phurin',
                'lname' => 'Lamakul',
                'email' => '64160284@go.buu.ac.th',
                'department_id' => 2,
                'role_id' => 3,
                'password' => Hash::make('123456789')
            ],
            [

                'id' => '64160165',
                'type' => 'H',
                'fname' => 'Benchamaphon',
                'lname' => 'Wongwiriya',
                'email' => '64160165@go.buu.ac.th',
                'department_id' => 2,
                'role_id' => 4,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160287',
                'type' => 'M',
                'fname' => 'Sarun',
                'lname' => 'Ruengtai',
                'email' => '64160288@go.buu.ac.th',
                'department_id' => 3,
                'role_id' => 5,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160167',
                'type' => 'E',
                'fname' => 'Phanida',
                'lname' => 'Thamwapee',
                'email' => '64160167@go.buu.ac.th',
                'department_id' => 3,
                'role_id' => 6,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160060',
                'type' => 'E',
                'fname' => 'Chasita',
                'lname' => 'Tochaona',
                'email' => '64160064@go.buu.ac.th',
                'department_id' => 4,
                'role_id' => 8,
                'password' => Hash::make('123456789')
            ],
            [
                'id' => '64160160',
                'type' => 'E',
                'fname' => 'Nattapak',
                'lname' => 'Jusuwansiri',
                'email' => '64160160@go.buu.ac.th',
                'department_id' => 4,
                'role_id' => 8,
                'password' => Hash::make('123456789')
            ]
        ];

        

        foreach($users as $user)
        {
            DB::table('users')->insert($user);
        }
    }
}
