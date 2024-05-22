<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\Files;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Files::all(['id', 'user_id']);

        $no = 1;
        foreach ($files as $file){

            $reveneu = random_int(0 , 25000);

            Download::insert([
                'owner_id' => $file['user_id'],
                'file_id' => $file['id'],
                'ip' => Str::random(10),
                'is_valid' => 'y',
                'reveneu' => $reveneu,
                'created_at' => Carbon::today()->subDays($no),
                'updated_at' => now()
            ]);

            User::where('id', $file['user_id'])
                ->increment('reveneu', $reveneu);

            $no++;
        }
    }
}
