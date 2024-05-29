<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class DownloadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $file = File::query()->get()->random();
        $reveneu = random_int(0 , 25000);

        User::where('id', $file['user_id'])
            ->increment('reveneu', $reveneu);

        return [
            'owner_id' => $file['user_id'],
            'file_id' => $file['id'],
            'ip' => fake()->ipv4(),
            'is_valid' => 'y',
            'reveneu' => $reveneu,
            'created_at' => fake()->dateTime('now'),
            'updated_at' => now()
        ];
    }
}
