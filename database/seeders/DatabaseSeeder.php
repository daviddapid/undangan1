<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin1',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'admin2',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'superadmin',
            'password' => bcrypt('password'),
            'role' => 'superadmin'
        ]);
    }

    private function generate30Guest()
    {
        for ($i = 4; $i <= 30; $i++) {
            User::create([
                'name' => 'tamu' . $i,
                'password' => bcrypt('password'),
                'role' => 'guest',
            ]);

            Guest::create([
                'number_of_person' => rand(1, 3),
                'phone' => $i . $i . $i . $i,
                'status' => 'attend',
                'user_id' => $i
            ]);
        }
    }
}
