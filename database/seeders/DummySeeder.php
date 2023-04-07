<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()
                    ->count(20)->state(new Sequence(
                        ['type' => 'E'],
                        ['type' => 'M'],
                        ['type' => 'H']
                    ))
                    ->create();
    }
}
