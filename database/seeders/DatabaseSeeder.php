<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\File;
use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // seed default data
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        // seed fake data
        User::factory()->count(10)->create();
        File::factory()->count(100)->create();
        Download::factory()->count(100)->create();
        Payment::factory()->count(100)->create();

    }
}
