<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'guest',
                'email' => 'guest@guest.com',
                'password' => bcrypt('1234'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('1234'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
