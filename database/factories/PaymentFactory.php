<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::query()->whereNot('id', [2, 3])->where('reveneu', '>', '0')->get()->random();

        $method = [
            'Digital Wallet - OVO',
            'Digital Wallet - Gopay',
            'Digital Wallet - ShopeePay',
            'Digital Wallet - DANA',
            'Pulsa - Telkomsel',
            'Pulsa - XL',
            'Pulsa - Axis',
            'Pulsa - Three',
            'Pulsa - Indosat',
            'Pulsa - SmartFren',
            'Bank - BCA',
            'Bank - BRI',
            'Bank - BNI',
            'Bank - Mandiri',
            'Bank - BTPN',
        ];
        $method_rand = $method[array_rand($method)];

        $status = ['pending', 'reject', 'success'];
        $status_rand = $status[array_rand($status)];

        return [
            'user_id' => $user['id'],
            'total' => random_int(5000, 100000),
            'method' => $method_rand,
            'destination' => fake()->phoneNumber(),
            'identity' => fake()->name(),
            'status' => $status_rand
        ];
    }
}
