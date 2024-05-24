<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $status = ['pending', 'reject', 'success'];
        $method = ['Bank', 'Digital Wallet'];

        for ($i = 0; $i < 500 ; $i++) {

            $c_status = $status[array_rand($status)];
            $c_method = $method[array_rand($method)];

            Payment::create([
                'user_id' => random_int(2 , 100),
                'total' => random_int(5000, 100000),
                'method' => $c_method,
                'destination' => random_int(1024, 99999999),
                'status' => $c_status
            ]);
        }
    }
}
