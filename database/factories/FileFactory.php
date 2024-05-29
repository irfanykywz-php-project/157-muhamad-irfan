<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $ext = ['jpg', 'zip', 'rar', 'mp3'];
        $ext_rand = $ext[array_rand($ext)];

        return [
            'user_id' => User::query()->whereNotIn('id', [1, 2])->get()->random(),
            'name' => fake()->name() . '.' . $ext_rand,
            'ext' => $ext_rand,
            'size' => random_int(1024, 99999999),
            'description' => Str::random(50),
            'downloaded' => random_int(1, 200),
            'viewed' => random_int(1, 200),
            'code' => Str::random('8'),
            'path' => ''
        ];
    }
}
