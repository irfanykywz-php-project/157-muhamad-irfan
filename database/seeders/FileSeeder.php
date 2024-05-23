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

        $ext = ['jpg', 'zip', 'rar', 'mp3'];

        for ($i = 0; $i < 500 ; $i++) {

            $c_ext = $ext[array_rand($ext)];

            Files::create([
                'user_id' => random_int(2 , 3),
                'name' => fake()->name() . '.' . $c_ext,
                'ext' => $c_ext,
                'size' => random_int(1024, 99999999),
                'description' => Str::random(100),
                'downloaded' => random_int(1, 200),
                'viewed' => random_int(1, 9999),
                'code' => Str::random('8'),
                'path' => ''
            ]);
         }
    }
}
