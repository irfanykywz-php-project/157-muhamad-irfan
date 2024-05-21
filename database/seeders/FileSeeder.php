<?php

namespace Database\Seeders;

use App\Models\Files;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100 ; $i++) {
            Files::create([
                'user_id' => 2,
                'name' => fake()->name(),
                'ext' => Str::random(3),
                'size' => random_int(1024, 99999999),
                'description' => Str::random(100),
                'downloaded' => random_int(1, 9999),
                'viewed' => random_int(1, 9999),
                'code' => Str::random('8'),
                'path' => ''
            ]);
         }
    }
}
