<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = $this->command->ask('Jadwal Count' , 100);

        $this->command->withProgressBar($count , function() use ($count){

            Jadwal::factory($count)->create();
        });

        $this->command->info('Seeding Jadwal OK');
    }
}
